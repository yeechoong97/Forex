@extends('layouts.default')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<div style="margin: 20px;margin-bottom: 20px;margin-top: 130px;height: 680px;">
    <div class="row" style="height: 680px;margin-right: 0px;margin-left: 0px;">
        @include('elearning.side-nav')
        <div class="col-md-6 col-xl-10 offset-xl-0 sidenav-con" style="margin-bottom: 0px;margin-left: 0px;margin-top: 0px;height: 2350px;">
            <div class="sidenav-content-details">
            <vr>
            <h3 id="learning-title">Forex Vs Stock</h3>
            <img src ="{{asset('pictures/ForexVStock.jpg')}}" class="img-padding" >
            <p>Traders often compare forex vs stocks to determine which market is better to trade. Despite being interconnected, the forex and stock market are vastly different. The forex market has unique characteristics that set it apart from other markets, and in the eyes of many, also make it far more attractive to trade.</p>
            <p>When choosing to trade forex or stocks, it often comes down to knowing which trading style suits you best.But knowing the differences and similarities between the stock and forex market also enables traders to make informed trading decisions based on factors such as market conditions, liquidity and volume.</p>
            <h5>Different between Forex and Stock</h5>
            <table class="table col-md-7 table-bordered table-striped">
                <thead>
                    <tr>
                    <th scope="col">Forex Market</th>
                    <th scope="col">Stock Market</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Large volume- Around $5 Trillion per day</td>
                    <td>Less volume – Roughly $200 billion per day</td>
                    </tr>
                    <tr>
                    <td>Highly Liquid</td>
                    <td>Less Liquid</td>
                    </tr>
                    <tr>
                    <td>24 Hour Markets</td>
                    <td>8 Hour Markets</td>
                    </tr>
                    <tr>
                    <td>Minimal or no commissions</td>
                    <td>Commissions</td>
                    </tr>
                    <tr>
                    <td>Narrow Focus</td>
                    <td>Wide Focus</td>
                    </tr>
                </tbody>
            </table>
            <ol>
            <b class="l-size"><li>Volume</li></b>
            One of the biggest differences between forex and stocks is the sheer size of the forex market. Forex is estimated to trade around $5 trillion a day, with most trading concentrated on a few major pairs like the EUR/USD, USD/JPY, GBP/USD and AUD/USD. The forex market volume dwarfs the dollar volume of all the world’s stock markets combined, which average roughly $200 billion per day.<br><br>
            Having such a large trading volume can bring many advantages to traders. High volume means traders can typically get their orders executed more easily and closer to the prices they want. While all markets are prone to gaps, having more liquidity at each pricing point better equips traders to enter and exit the market.
            <b class="l-size"><li>Liquidity</li></b>
            A market that trades in high volume generally has high liquidity. Liquidity leads to tighter spreads and lower transaction costs. Forex major pairs typically have extremely low spreads and transactions costs when compared to stocks and this is one of the major advantages of trading the forex market versus trading the stock market.
            <b class="l-size"><li>24 Hour Markets</li></b>
            Forex is an over the counter market meaning that it is not transacted over a traditional exchange. Trading is facilitated through the interbank market. This means that trading can go on all around the world during different countries business hours and trading sessions. Therefore, the forex trader has access to trading virtually 24 hours a day, 5 days a week. Major stock indices on the other hand, trade at different times and are affected by different variables.
            <img src ="{{asset('pictures/ForexSession.png')}}" class="img-padding" >
            <b class="l-size"><li>Minimal or No Comission</li></b>
            Most forex brokers charge no commission, instead they make their margin on the spread – which is the difference between the buy price and the sell price. When trading equities (stocks) or a futures contract, or a major index like the S&P 500, often traders must pay the spread along with a commission to a broker.
            <b class="l-size"><li>Narrow focus vs wide focus</li></b>
            There are eight major currencies traders can focus on, while in the stock universe there are thousands. With only eight economies to focus on and since forex is traded in pairs, traders will look for diverging and converging trends between the currencies to match up a forex pair to trade. Eight currencies are easier to keep an eye on than thousands of stocks.
            </ol>
            <p>*Adapted from "<b>Forex Vs Stocks: Top Differences & How to Trade Them</b>" by <b>DailyFX.com</b> (https://www.dailyfx.com/education/beginner/forex-vs-stocks.html)</p>
            
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/elearning.js')}}"></script>   
@stop

