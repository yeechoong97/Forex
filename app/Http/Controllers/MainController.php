<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Input;
use App\Order;
use Carbon\Carbon;
use App\Account;
use App\Trades;
use DateTime;
use Auth;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->user_id;
        $account = Account::with(['order' => function($query){
                    $query->where('status',0)->orderBy('created_at','desc');
                    }])->where('user_id',$id)->first();
        if(!$account) throw new ModelNotFoundException;

        $url = "https://api-fxpractice.oanda.com/v3/accounts/101-011-15419455-001/instruments/EUR_USD/candles?count=500&price=M&granularity=S5&smooth=true";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  //Disable SSL
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 8821ff866c725c0f3fc2ba5bc9fe9a6e-ad7c4f2e55fecfbfd8bdd5fa72a68697',
                'Content-Type: application/json'
            ),
        ));
        
        $response = curl_exec($curl);
        curl_close($curl);       
        //Pass the EURUSD data from server to front end
        $data = "";
        $parseResponse = json_decode($response,true);

        foreach($parseResponse['candles'] as $pResponse)
        {
            $tempDate = substr($pResponse['time'],0,-7);
            $tempDate = $tempDate."Z";
            $myDate = strtotime($tempDate);
            $tempResult = $myDate."000" .",". ($pResponse['mid']['o']). ",". ($pResponse['mid']['h']). ",". ($pResponse['mid']['l']). ",". ($pResponse['mid']['c']).",".$pResponse['volume']."\n";
            $data = $data . $tempResult;
        }
        $instrument = $parseResponse['instrument'];

        $url = "https://api-fxpractice.oanda.com/v3/accounts/101-011-15419455-001/pricing?instruments=EUR_USD%2CAUD_USD%2CGBP_USD%2CUSD_JPY%2CEUR_JPY";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  //Disable SSL
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 8821ff866c725c0f3fc2ba5bc9fe9a6e-ad7c4f2e55fecfbfd8bdd5fa72a68697',
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);    
        $parseResponse = json_decode($response,true);
        $tempData = [];

        foreach($parseResponse['prices'] as $pResponse)
        {
            $tempInstrument= $pResponse['instrument'];
            $tempSell=$pResponse['closeoutBid'];
            $tempBuy=$pResponse['closeoutAsk'];
            $tempResult = [];
            array_push($tempResult,$tempInstrument,$tempSell,$tempBuy);
            array_push($tempData,$tempResult);
        }
 
        return view('trade.index',[
            'instrument' => $instrument,
            'data' => $data,
            'account' => $account,
            'tempData' => $tempData
        ]); 
    }

    public function create(Request $request)
    {
        $id = Auth::user()->user_id;
        $user_leverage = Account::where('user_id',$id)->first()->value('leverage');
        $arr_leverage = explode(":",$user_leverage);
        $leverage = intval($arr_leverage[0]);
        $flag = false;
        $remaining_unit = $request->unit;
        $margin = 0;
        $ticketid = "";
        $message = "";

        //Loop to check any opposite orders to new order
        while($flag!=true)
        {
            //Retrieve the oldest order 
            $order = Order::where('user_id',$id)
            ->where('pair',$request->instrument)
            ->where('type','!=',$request->type)
            ->where('status',0)
            ->oldest()
            ->first();
            
            //Check is there any orders
            if ($order!=null)
            {
                $existing = $remaining_unit;
                $remaining_unit = $remaining_unit - $order->available_units;
                $reduced_unit = 0;
                
                //Check the new order units comparing to exisiting orders
                if($remaining_unit>0)
                {
                    $reduced_unit = $order->available_units;
                    $order->available_units = 0;
                    $order->status = 1;
                    $flag=false;
                }
                else
                {
                    $reduced_unit = $request->unit;
                    $order->available_units = $order->available_units - $existing;
                    $flag=true;
                    $message="Orders have been reduced/closed successfully.";
                }

                $ticketid = $order->ticketID;
                if ($order->available_units ==0){ $order->status = 1;}

                //Calculate the margin
                $midpoint = (floatval($request->entry) + floatval($request->exit))/2;
                switch($request->instrument)
                {
                    case "USD/JPY":
                        $margin = round(($reduced_unit/$leverage),4);
                        break;
            
                    case "EUR/JPY":
                        $temp_sell = $request->EURUSD_sell;
                        $temp_buy = $request->EURUSD_buy;
                        $midpoint = (floatval($temp_sell) + floatval($temp_buy))/2;
                        $margin = round(($reduced_unit/$leverage*$midpoint),4);
                        break;
            
                    default: 
                        $margin = round(($reduced_unit/$leverage*$midpoint),4);
                        break;
                }

                if($remaining_unit>0)
                {
                    $margin = $order->margin;
                }
                $order->margin = $order->margin - $margin;
                $order->save();

                $pre_profit=0;
                $multiply = 10000;
                $pips = 0;

                //Compute the profit and cost
                switch($request->instrument)
                {
                    case "USD/JPY":
                        $sell = $request->USDJPY_sell;
                        $buy = $request->USDJPY_buy;
                        $midpoint = (floatval($sell) + floatval($buy)) /2;
                        $pre_profit = 0.01 * $reduced_unit / $midpoint ;
                        $multiply = 100;
                        break;

                    case "EUR/JPY":
                        $sell = $request->USDJPY_sell;
                        $buy = $request->USDJPY_buy;
                        $midpoint = (floatval($sell) + floatval($buy)) /2;
                        $pre_profit = 0.01 * $reduced_unit / $midpoint ;
                        $multiply = 100;
                        break;

                    default:
                        $pre_profit = 0.0001 * $reduced_unit ;
                        break;
                }

                if($request->type == "Short")
                {
                    $pips = ($request->entry - $order->entry_price) * $multiply;
                }
                else
                {
                    $pips = ($order->entry_price - $request->entry) * $multiply;
                }

                //Insert new trade record
                $trades = new Trades();
                $trades->ticketID =  $ticketid;
                $trades->units = $reduced_unit;
                $trades->exit_price =  $request->entry;
                $trades->cost =  $pips;
                $trades->profit =  $pre_profit * $pips;
                $trades->save();

                //Update the account balance and margin
                $used_margin = 0;
                $account = Account::with(['order' => function($query){
                            $query->where('status',0);
                            }])->where('user_id',$id)->first();
                foreach($account->order as $order)
                {
                    $used_margin += $order->margin;
                }
                $account->balance = $account->balance + ($pre_profit * $pips);
                $account->margin = $account->margin + ($pre_profit * $pips) + $margin;
                $account->margin_used = $used_margin/($account->margin+ $used_margin)*100;
                if($account->margin > $account->balance){
                    $account->margin = $account->balance;
                }
                $account->save();
            }
            else
            {
                $last_record_id = Order::orderBy('id','desc')->first();
                if(!$last_record_id){
                    $ticketid = "AOD1" ;
                } 
                else{
                    $ticketid = "AOD" . ($last_record_id->id + 1);
                }

                $margin = $request->margin;
                if($request->unit != $remaining_unit)
                {
                    $midpoint = (floatval($request->entry) + floatval($request->exit))/2;
                    switch($request->instrument)
                    {
                        case "USD/JPY":
                            $margin = round(($reduced_unit/$leverage),4);
                            break;
                
                        case "EUR/JPY":
                            $temp_sell = $request->EURUSD_sell;
                            $temp_buy = $request->EURUSD_buy;
                            $midpoint = (floatval($temp_sell) + floatval($temp_buy))/2;
                            $margin = round(($reduced_unit/$leverage*$midpoint),4);
                            break;
                
                        default: 
                            $margin = round(($reduced_unit/$leverage*$midpoint),4);
                            break;
                    }
                }
                $order = new Order();
                $order->user_id = $id;
                $order->ticketID = $ticketid;
                $order->margin = $margin;
                $order->pair = $request->instrument;
                $order->total_units = $remaining_unit;
                $order->available_units = $remaining_unit;
                $order->type = $request->type;
                $order->entry_price = $request->entry;
                $order->save();

                $used_margin = 0;
                $account = Account::with(['order' => function($query){
                            $query->where('status',0);
                            }])->where('user_id',$id)->first();
                foreach($account->order as $order)
                {
                    $used_margin += $order->margin;
                }
                $account->balance = $account->balance ;
                $account->margin = $account->margin - $margin;
                $account->margin_used = $used_margin/($account->margin + $used_margin)*100;
                $account->save();
                $message="New Order has been created successfully.";
                $flag=true;
            }
        }
        return response()->json(['message'=> $message]);
    }

    public function close(Request $request)
    {
        $id = Auth::user()->user_id;
        //Update the order table 
        $order = Order::where('ticketID',$request->ticketID)->first();
        $units_used = $order->available_units;
        if ($request->remaining_units ==0){ $order->status = 1;}
        $order->available_units = $request->remaining_units;
        $return_margin = $order->margin - $request->margin;
        $order->margin = $request->margin;
        $order->save();

        //Insert new trade record
        $trades = new Trades();
        $trades->ticketID = $request->ticketID;
        $trades->units = $units_used - $request->remaining_units;
        $trades->exit_price =  $request->exit;
        $trades->cost =  $request->cost;
        $trades->profit =  $request->profit;
        $trades->save();

        //Update the account balance and margin
        $margin = 0;
        $account = Account::with(['order' => function($query){
                    $query->where('status',0);
                    }])->where('user_id',$id)->first();
        foreach($account->order as $order)
        {
            $margin += $order->margin;
        }
        $account->balance = $account->balance + $request->profit;
        $account->margin = $account->margin + $request->profit + $return_margin;
        $account->margin_used = $margin/($account->margin + $margin)*100;
        if($account->margin > $account->balance){
            $account->margin = $account->balance;
        }
        $account->save();

        return response()->json(['message'=> "Orders have been reduced/closed successfully."]);
    }


    public function getCandle(Request $request)
    {
        $instrument = $request->instrument;
        $interval = $request->interval;
        $url = "https://api-fxpractice.oanda.com/v3/accounts/101-011-15419455-001/instruments/".$instrument."/candles?count=1&price=M&granularity=".$interval."&smooth=true";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  //Disable SSL
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 8821ff866c725c0f3fc2ba5bc9fe9a6e-ad7c4f2e55fecfbfd8bdd5fa72a68697',
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        $data = "";        
        $parseResponse = json_decode($response,true);
        foreach($parseResponse['candles'] as $pResponse)
        {
            $tempDate = substr($pResponse['time'],0,-7);
            $tempDate = $tempDate."Z";
            $myDate = strtotime($tempDate);
            $tempResult = $myDate."000" .",". ($pResponse['mid']['o']). ",". ($pResponse['mid']['h']). ",". ($pResponse['mid']['l']). ",". ($pResponse['mid']['c']).",".$pResponse['volume']."\n";
            $data = $data . $tempResult;
        }
        $instrument = $parseResponse['instrument'];
        return response()->json(array('response'=> $data,'instrument'=> $instrument),200);
    }

    public function changeSeries(Request $request)
    {
        $instrument = $request->instrument;
        $interval = $request->interval;
        $url = "https://api-fxpractice.oanda.com/v3/accounts/101-011-15419455-001/instruments/".$instrument."/candles?count=500&price=M&granularity=".$interval."&smooth=true";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  //Disable SSL
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 8821ff866c725c0f3fc2ba5bc9fe9a6e-ad7c4f2e55fecfbfd8bdd5fa72a68697',
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $data = "";        
        $parseResponse = json_decode($response,true);

        foreach($parseResponse['candles'] as $pResponse)
        {
            $tempDate = substr($pResponse['time'],0,-7);
            $tempDate = $tempDate."Z";
            $myDate = strtotime($tempDate);
            $tempResult = $myDate."000" .",". ($pResponse['mid']['o']). ",". ($pResponse['mid']['h']). ",". ($pResponse['mid']['l']). ",". ($pResponse['mid']['c']).",".$pResponse['volume']."\n";
            $data = $data . $tempResult;
        }
        $instrument = $parseResponse['instrument'];
        return response()->json(array('response'=> $data,'instrument'=> $instrument),200);
    }
}
