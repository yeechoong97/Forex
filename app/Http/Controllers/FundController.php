<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Input;
use App\Order;
use App\Account;
use App\Trades;
use App\User;
use Carbon\Carbon;
use Auth;

class FundController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->user_id;
        $account = Account::with(['order' => function($query){
                   $query->where('status',0);}])->with('user')->where('user_id',$id)->first();
       
        return view('funds.index',[
            'account' => $account,
        ]);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->user_id;
        $account = Account::where('user_id',$id)->first();
        $account->leverage = $request->leverage;
        $account->save();
        return redirect()->route('fund-index')->with('alert', 'Leverage is Updated Successfully!'); 
    }

    public function withdraw_index()
    {
        $id = Auth::user()->user_id;
        $account = Account::with('user')->where('user_id',$id)->first();
        return view('funds.withdraw',[
            'account' =>  $account
        ]);
    }

    public function withdraw_update(Request $request)
    {
        $id = Auth::user()->user_id;
        $margin = 0;
        $account = Account::with(['order' => function($query){
                    $query->where('status',0);
                    }])->where('user_id',$id)->first();
        foreach($account->order as $order)
        {
            $margin += $order->margin;
        }
        $account->balance = floatval($account->balance) - floatval($request->amount);
        $account->margin = floatval($account->margin) - floatval($request->amount);
        $account->margin_used = $margin / floatval($account->margin) *100 ;
        $account->save();
        return redirect()->route('fund-index')->with('alert', 'Balance is Updated Successfully!'); 
    }

    public function deposit_index()
    {
        $id = Auth::user()->user_id;
        $account = Account::with('user')->where('user_id',$id)->first();
        return view('funds.deposit',[
            'account' => $account
        ]);
    }

    public function deposit_update(Request $request)
    {
        $id = Auth::user()->user_id;
        $margin = 0;
        $account = Account::with(['order' => function($query){
                    $query->where('status',0);
                    }])->where('user_id',$id)->first();
        foreach($account->order as $order)
        {
            $margin += $order->margin;
        }
        $account->balance = floatval($account->balance) + floatval($request->amount);
        $account->margin = floatval($account->margin) + floatval($request->amount);
        $account->margin_used = $margin / floatval($account->margin) *100 ;
        $account->save();
        return redirect()->route('fund-index')->with('alert', 'Balance is Updated Successfully!'); 
    }

}
