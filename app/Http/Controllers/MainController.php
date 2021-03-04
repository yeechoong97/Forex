<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use App\Order;
use App\User;
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
                    }])
                    ->with('user')->where('user_id',$id)->first();
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
        $parseResponse = json_decode($response,true);
        $data = "";
        foreach($parseResponse['candles'] as $pResponse)
        {
            $tempDate = substr($pResponse['time'],0,-7);
            $tempDate = $tempDate."Z";
            $myDate = strtotime($tempDate);
            if($data=="")
                $tempResult = $myDate."000" .",". ($pResponse['mid']['o']). ",". ($pResponse['mid']['h']). ",". ($pResponse['mid']['l']). ",". ($pResponse['mid']['c']).",".$pResponse['volume']."";
            else
                $tempResult = ",".$myDate."000" .",". ($pResponse['mid']['o']). ",". ($pResponse['mid']['h']). ",". ($pResponse['mid']['l']). ",". ($pResponse['mid']['c']).",".$pResponse['volume']."";
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
            'tempData' => $tempData,
        ]); 
    }

    public function create(Request $request)
    {
        $userID = Auth::user()->user_id;
        $flagCheck = false;
        $marginComputed = 0;
        $preProfit=0;
        $multiplyFormula = 10000;
        $spreadValue = 0;
        $usedMargin = 0;
        $ticketID = "";
        $responseMessage = "";
        $orderType = "";
        $remainingUnit = $request->orderObject['unit'];
        $userLeverage = intval($request->orderObject['leverage']);
        $orderType = ($request->orderObject['type']=="sell") ? "Short" : "Long";

        //Loop to check any opposite orders to new order
        while($flagCheck!=true)
        {
            //Retrieve the oldest order 
            $order = Order::where('user_id',$userID)
            ->where('pair',$request->orderObject['instrument'])
            ->where('type','!=',$orderType)
            ->where('status',0)
            ->oldest()
            ->first();
            
            //Check is there any orders
            if ($order!=null)
            {
                $existingUnit = $remainingUnit;
                $remainingUnit = $remainingUnit - $order->available_units;
                $reducedUnit = 0;
                
                //Check the new order units comparing to exisiting orders
                if($remainingUnit>0)
                {
                    $reducedUnit = $order->available_units;
                    $order->available_units = 0;
                    $order->status = 1;
                    $flagCheck=false;
                }
                else
                {
                    $reducedUnit = $request->orderObject['unit'];
                    $order->available_units = $order->available_units - $existingUnit;
                    $flagCheck=true;
                    $responseMessage="Orders have been reduced/closed successfully.";
                }

                $ticketID = $order->ticketID;
                if ($order->available_units ==0)
                    $order->status = 1;

                //Calculate the margin
                $midPoint = (floatval($request->orderObject['entry']) + floatval($request->orderObject['exit']))/2;
                switch($request->orderObject['instrument'])
                {
                    case "USD/JPY":
                        $midPoint = 1;
                        break;
                    case "EUR/JPY":
                        $EURUSDSell = $request->orderObject['EURUSDSell'];
                        $EURUSDBuy = $request->orderObject['EURUSDBuy'];
                        $midPoint = (floatval($EURUSDSell) + floatval($EURUSDBuy))/2;
                        break;
                }
                $marginComputed = round(($reducedUnit/$userLeverage*$midPoint),4);

                if($remainingUnit>0)
                    $marginComputed = $order->margin;
                $order->margin = round(($order->margin - $marginComputed),2);
                $order->save();

                //Compute the profit and cost
                switch($request->orderObject['instrument'])
                {
                    case "EUR/JPY":
                    case "USD/JPY":
                        $USDJPYSell = $request->orderObject['USDJPYSell'];
                        $USDJPYBuy = $request->orderObject['USDJPYBuy'];
                        $midPoint = (floatval($USDJPYSell) + floatval($USDJPYBuy)) /2;
                        $preProfit = 0.01 * $reducedUnit / $midPoint ;
                        $multiplyFormula = 100;
                        break;
                    default:
                        $preProfit = 0.0001 * $reducedUnit ;
                        break;
                }

                if($orderType == "Short")
                    $spreadValue = ($request->orderObject['entry'] - $order->entry_price) * $multiplyFormula;
                else
                    $spreadValue = ($order->entry_price - $request->orderObject['entry']) * $multiplyFormula;

                //Insert new trade record
                $trades = new Trades();
                $trades->ticketID =  $ticketID;
                $trades->units = $reducedUnit;
                $trades->exit_price =  $request->orderObject['entry'];
                $trades->cost =  $spreadValue;
                $trades->profit =  $preProfit * $spreadValue;
                $trades->save();

                //Update the account balance and margin
                $account = Account::with(['order' => function($query){
                            $query->where('status',0);
                            }])->where('user_id',$userID)->first();
                foreach($account->order as $order)
                {
                    $usedMargin += $order->margin;
                }
                $account->balance = $account->balance + ($preProfit * $spreadValue);
                $account->margin = $account->margin + ($preProfit * $spreadValue) + $marginComputed;
                $account->margin_used = $usedMargin/($account->margin+ $usedMargin)*100;
                if($account->margin > $account->balance)
                    $account->margin = $account->balance;
                $account->save();
            }
            else
            {
                $lastRecordID = Order::orderBy('id','desc')->first();
                $ticketID = (!$lastRecordID) ? "AOD1" : "AOD" . ($lastRecordID->id + 1);
                $marginComputed = $request->orderObject['margin'];
                if($request->orderObject['unit'] != $remainingUnit)
                {
                    $midPoint = (floatval($request->orderObject['entry']) + floatval($request->orderObject['exit']))/2;
                    switch($request->orderObject['instrument'])
                    {
                        case "USD/JPY":
                            $midPoint = 1;
                            break;
                        case "EUR/JPY":
                            $EURUSDSell = $request->orderObject['EURUSDSell'];
                            $EURUSDBuy = $request->orderObject['EURUSDBuy'];
                            $midPoint = (floatval($EURUSDSell) + floatval($EURUSDBuy))/2;
                            break;
                    }
                    $marginComputed = round(($reducedUnit/$userLeverage*$midpoint),4);
                }
                $order = new Order();
                $order->user_id = $userID;
                $order->ticketID = $ticketID;
                $order->margin = round($marginComputed,2);
                $order->pair = $request->orderObject['instrument'];
                $order->total_units = $remainingUnit;
                $order->available_units = $remainingUnit;
                $order->type = $orderType;
                $order->entry_price = $request->orderObject['entry'];
                $order->save();

                $usedMargin = 0;
                $account = Account::with(['order' => function($query){
                            $query->where('status',0);
                            }])->where('user_id',$userID)->first();
                foreach($account->order as $order)
                {
                    $usedMargin += $order->margin;
                }
                $account->balance = $account->balance ;
                $account->margin = $account->margin - $marginComputed;
                $account->margin_used = $usedMargin/($account->margin + $usedMargin)*100;
                $account->save();
                $responseMessage="New Order has been created successfully.";
                $flagCheck=true;
            }
        }
        return response()->json(['message'=> $responseMessage]);
    }

    public function close(Request $request)
    {
        $userID = Auth::user()->user_id;
        //Update the order table 
        $order = Order::where('ticketID',$request->orderObject['ticketID'])->first();
        $unitUsed = $order->available_units;
        if ($request->orderObject['remaining_units'] ==0)
            $order->status = 1;
        $order->available_units = $request->orderObject['remaining_units'];
        $returnedMargin = $order->margin - $request->orderObject['margin'];
        $order->margin = round($request->orderObject['margin'],1);
        $order->save();

        //Insert new trade record
        $trades = new Trades();
        $trades->ticketID = $request->orderObject['ticketID'];
        $trades->units = $unitUsed - $request->orderObject['remaining_units'];
        $trades->exit_price =  $request->orderObject['exit'];
        $trades->cost =  $request->orderObject['cost'];
        $trades->profit =  $request->orderObject['profit'];
        $trades->save();

        //Update the account balance and margin
        $marginTotal = 0;
        $account = Account::with(['order' => function($query){
                    $query->where('status',0);
                    }])->where('user_id',$userID)->first();
        foreach($account->order as $order)
        {
            $marginTotal += $order->margin;
        }
        $account->balance = $account->balance + $request->orderObject['profit'];
        $account->margin = $account->margin + $request->orderObject['profit'] + $returnedMargin;
        $account->margin_used = $marginTotal/($account->margin + $marginTotal)*100;
        if($account->margin > $account->balance){
            $account->margin = $account->balance;
        }
        $account->save();

        return response()->json(['message'=> "Orders have been reduced/closed successfully."]);
    }


    public function getCandle(Request $request)
    {
        $chartInstrument = $request->chartObject['instrument'];
        $chartInterval = $request->chartObject['interval'];
        $url = "https://api-fxpractice.oanda.com/v3/accounts/101-011-15419455-001/instruments/".$chartInstrument."/candles?count=1&price=M&granularity=".$chartInterval."&smooth=true";
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
        session(['login'=>1]); 
        return response()->json(array('response'=> $data),200);
    }

    public function changeSeries(Request $request)
    {
        $instrumentSelected = $request->chartObject['instrument'];
        $intervalSelected = $request->chartObject['interval'];
        $url = "https://api-fxpractice.oanda.com/v3/accounts/101-011-15419455-001/instruments/".$instrumentSelected."/candles?count=500&price=M&granularity=".$intervalSelected."&smooth=true";
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
        // $data = "";        
        $parseResponse = json_decode($response,true);

        // foreach($parseResponse['candles'] as $pResponse)
        // {
        //     $tempDate = substr($pResponse['time'],0,-7);
        //     $tempDate = $tempDate."Z";
        //     $myDate = strtotime($tempDate);
        //     $tempResult = $myDate."000" .",". ($pResponse['mid']['o']). ",". ($pResponse['mid']['h']). ",". ($pResponse['mid']['l']). ",". ($pResponse['mid']['c']).",".$pResponse['volume']."\n";
        //     $data = $data . $tempResult;
        // }
        $data = "";
        foreach($parseResponse['candles'] as $pResponse)
        {
            $tempDate = substr($pResponse['time'],0,-7);
            $tempDate = $tempDate."Z";
            $myDate = strtotime($tempDate);
            if($data=="")
                $tempResult = $myDate."000" .",". ($pResponse['mid']['o']). ",". ($pResponse['mid']['h']). ",". ($pResponse['mid']['l']). ",". ($pResponse['mid']['c']).",".$pResponse['volume']."";
            else
                $tempResult = ",".$myDate."000" .",". ($pResponse['mid']['o']). ",". ($pResponse['mid']['h']). ",". ($pResponse['mid']['l']). ",". ($pResponse['mid']['c']).",".$pResponse['volume']."";
            $data = $data . $tempResult;
        }

        $instrument = $parseResponse['instrument'];
        return response()->json(array('response'=> $data,'instrument'=> $instrument),200);
    }

    function setTutorial(Request $request)
    {
        $id = Auth::user()->user_id;
        $user = User::where('user_id',$id)->first();
        $tutorial = ($request->status == "true")? 1 : 0;
        $user->tutorial = $tutorial;
        $user->save();
    }

    function chat_index()
    {
        $user = Auth::user();
        return view('subpage.join-chat',[
            'user'=> $user
        ]);
    }

    function getCurrencyRate(Request $request){
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
        $resultArray=[];
        foreach($parseResponse['prices'] as $pResponse)
        {
            $tempInstrument = $pResponse['instrument'];
            $tempSell=$pResponse['closeoutBid'];
            $tempBuy=$pResponse['closeoutAsk'];
            $tempResult = [];
            array_push($tempResult,$tempInstrument,$tempSell,$tempBuy);
            array_push($resultArray,$tempResult);
        }

        return response()->json(array('response'=> $resultArray),200);
    }

}
