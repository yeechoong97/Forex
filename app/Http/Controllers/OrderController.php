<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Account;
use App\Trades;
use Carbon\Carbon;
use App\Forum;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $arrayResult=[];
        $EUR_USD = [0,0];
        $AUD_USD = [0,0];
        $GBP_USD = [0,0];
        $USD_JPY = [0,0];;
        $EUR_JPY = [0,0];
        $numberOfMonths = [];
        $numberOfOrders = 0;
        $user = Auth::user();
        $trades = DB::table('orders')
		->where('orders.user_id',$user->user_id)
		->join('trades', 'orders.ticketID', '=', 'trades.ticketID')
		->select('orders.ticketID','orders.pair','trades.profit','trades.created_at')
		->orderby('trades.created_at','desc')
        ->get();
        if($trades->isNotEmpty())
        {
            $startOfMonth = Carbon::parse($trades[0]->created_at)->startOfMonth();
            $endOfMonth = Carbon::parse($trades[0]->created_at)->endOfMonth();
            $startOfLastRecord = Carbon::parse($trades[count($trades)-1]->created_at)->startOfMonth();
            $differenceMonths = $startOfLastRecord->diffInMonths($startOfMonth);
            array_push($numberOfMonths, $startOfLastRecord);
            for($i = 1; $i<=$differenceMonths;$i++)
            {
                $startOfLastRecord = Carbon::parse($trades[count($trades)-1]->created_at)->startOfMonth();
                $monthInterval = $startOfLastRecord->addMonth($i);
                array_push($numberOfMonths, $monthInterval);
            }

            foreach($trades as $trade)
            {   
                $tradeDate = Carbon::parse($trade->created_at);
                if($tradeDate->lte($endOfMonth)===true && $tradeDate->gte($startOfMonth)===true)
                {
                    switch($trade->pair)
                    {
                        case "EUR/USD":
                            if($trade->profit>=0)
                                $EUR_USD[0] += $trade->profit;
                            else
                                $EUR_USD[1] += abs($trade->profit);
                            break;
                        case "AUD/USD":
                            if($trade->profit>=0)
                                $AUD_USD[0] += $trade->profit;
                            else
                                $AUD_USD[1] += abs($trade->profit);
                            break;
                        case "GBP/USD":
                            if($trade->profit>=0)
                                $GBP_USD[0] += $trade->profit;
                            else
                                $GBP_USD[1] += abs($trade->profit);
                            break;
                        case "USD/JPY":
                            if($trade->profit>=0)
                                $USD_JPY[0] += $trade->profit;
                            else
                                $USD_JPY[1] += abs($trade->profit);
                            break;
                        case "EUR/USD":
                            if($trade->profit>=0)
                                $EUR_JPY[0] += $trade->profit;
                            else
                                $EUR_JPY[1] += abs($trade->profit);
                            break;
                    }
                    $numberOfOrders+=1;
                }
            }
            $totalProfit = $EUR_USD[0] + $AUD_USD[0] + $GBP_USD[0] + $USD_JPY[0] + $EUR_JPY[0];
            $totalLoss = $EUR_USD[1] + $AUD_USD[1] + $GBP_USD[1] + $USD_JPY[1] + $EUR_JPY[1];
            array_push($arrayResult,$numberOfOrders,$totalProfit,$totalLoss,$EUR_USD,$AUD_USD,$GBP_USD,$USD_JPY,$EUR_JPY);
            return view('order.summary',[
                'user'=>$user,
                'monthlySummary' => $arrayResult,
                'numberOfMonths' => $numberOfMonths,
                'selectedMonth' => $startOfMonth
            ]);               
        }
        else
        {
            $totalProfit = 0;
            $totalLoss = 0;
            $numberOfOrders = 0;
            $now = Carbon::now();
            array_push($numberOfMonths,$now);
            array_push($arrayResult,$numberOfOrders,$totalProfit,$totalLoss,$EUR_USD,$AUD_USD,$GBP_USD,$USD_JPY,$EUR_JPY);    
            return view('order.summary',[
                'user'=>$user,
                'monthlySummary' => $arrayResult,
                'numberOfMonths' => $numberOfMonths,
                'selectedMonth' => $now
            ]);  
        }
    }

    public function changeMonth(Request $request)
    {
        $user = Auth::user();
        $trades = DB::table('orders')
		->where('orders.user_id',$user->user_id)
		->join('trades', 'orders.ticketID', '=', 'trades.ticketID')
		->select('orders.ticketID','orders.pair','trades.profit','trades.created_at')
		->orderby('trades.created_at','desc')
        ->get();

        $arrayResult=[];
        $EUR_USD = [0,0];
        $AUD_USD = [0,0];
        $GBP_USD = [0,0];
        $USD_JPY = [0,0];;
        $EUR_JPY = [0,0];
        $numberOfMonths = [];
        $numberOfOrders = 0;
        $startOfMonth = Carbon::parse($trades[0]->created_at)->startOfMonth();
        $endOfMonth = Carbon::parse($trades[0]->created_at)->endOfMonth();

        $selectedStartMonth = Carbon::parse($request->month_select)->startOfMonth();
        $selectedEndMonth = Carbon::parse($request->month_select)->endOfMonth();

        $startOfLastRecord = Carbon::parse($trades[count($trades)-1]->created_at)->startOfMonth();
        $differenceMonths = $startOfLastRecord->diffInMonths($startOfMonth);
        array_push($numberOfMonths, $startOfLastRecord);
        for($i = 1; $i<=$differenceMonths;$i++)
        {
            $startOfLastRecord = Carbon::parse($trades[count($trades)-1]->created_at)->startOfMonth();
            $monthInterval = $startOfLastRecord->addMonth($i);
            array_push($numberOfMonths, $monthInterval);
        }

        foreach($trades as $trade)
        {   
            $tradeDate = Carbon::parse($trade->created_at);
            if($tradeDate->lte($selectedEndMonth)===true && $tradeDate->gte($selectedStartMonth)===true)
            {
                switch($trade->pair)
                {
                    case "EUR/USD":
                        if($trade->profit>=0)
                            $EUR_USD[0] += $trade->profit;
                        else
                            $EUR_USD[1] += abs($trade->profit);
                        break;
                    case "AUD/USD":
                        if($trade->profit>=0)
                            $AUD_USD[0] += $trade->profit;
                        else
                            $AUD_USD[1] += abs($trade->profit);
                        break;
                    case "GBP/USD":
                        if($trade->profit>=0)
                            $GBP_USD[0] += $trade->profit;
                        else
                            $GBP_USD[1] += abs($trade->profit);
                        break;
                    case "USD/JPY":
                        if($trade->profit>=0)
                            $USD_JPY[0] += $trade->profit;
                        else
                            $USD_JPY[1] += abs($trade->profit);
                        break;
                    case "EUR/USD":
                        if($trade->profit>=0)
                            $EUR_JPY[0] += $trade->profit;
                        else
                            $EUR_JPY[1] += abs($trade->profit);
                        break;
                }
                $numberOfOrders+=1;
            }
        }
        $totalProfit = $EUR_USD[0] + $AUD_USD[0] + $GBP_USD[0] + $USD_JPY[0] + $EUR_JPY[0];
        $totalLoss = $EUR_USD[1] + $AUD_USD[1] + $GBP_USD[1] + $USD_JPY[1] + $EUR_JPY[1];
        array_push($arrayResult,$numberOfOrders,$totalProfit,$totalLoss,$EUR_USD,$AUD_USD,$GBP_USD,$USD_JPY,$EUR_JPY);
        return view('order.summary',[
            'user'=>$user,
            'monthlySummary' => $arrayResult,
            'numberOfMonths' => $numberOfMonths,
            'selectedMonth' => $request->month_select
        ]);
    }
    
    public function showHistory(Request $request)
    {
        $id = Auth::user()->user_id;
        
        $start = DB::table('orders')
		->where('orders.user_id',$id)
		->join('trades', 'orders.ticketID', '=', 'trades.ticketID')
        ->select('trades.created_at')
        ->orderby('trades.created_at','asc')
        ->first();

        $now = Carbon::now()->toDateString();
        if($start==null)
            $start = $now;
        else
        {
            $dateTime = strtotime($start->created_at);
            $start = date('Y-m-d',$dateTime);
        }

        $trades = DB::table('orders')
		->where('orders.user_id',$id)
		->join('trades', 'orders.ticketID', '=', 'trades.ticketID')
		->select('orders.user_id','orders.ticketID','orders.pair','orders.type','orders.entry_price','trades.units','trades.exit_price','trades.cost','trades.profit','trades.created_at')
		->orderby('trades.created_at','desc')
        ->paginate(8);
        
        return view('order.order-history',[
            'trades'=> $trades,
            'start'=> $start,
            'now' => $now,
        ]);
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) 
        {
            $id = Auth::user()->user_id;
            $trades = DB::table('orders')
            ->where('orders.user_id',$id)
            ->join('trades', 'orders.ticketID', '=', 'trades.ticketID')
            ->select('orders.user_id','orders.ticketID','orders.pair','orders.type','orders.entry_price','trades.units','trades.exit_price','trades.cost','trades.profit','trades.created_at')
            ->whereDate('trades.created_at','>=',$request->data['start'])
            ->whereDate('trades.created_at','<=',$request->data['end'])
            ->orderBy($request->data['sort'],$request->data['order'])
            ->paginate(8);

            return view('order.order-table',[
                    'trades' => $trades,
                    ])->render();
        }
    }


}
