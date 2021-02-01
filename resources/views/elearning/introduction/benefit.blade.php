@extends('layouts.default')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">


<div style="margin: 20px;margin-bottom: 20px;margin-top: 130px;height: 680px;">
    <div class="row" style="height: 680px;margin-right: 0px;margin-left: 0px;">
        @include('elearning.side-nav')
        <div class="col-md-6 col-xl-10 offset-xl-0 sidenav-con" style="margin-bottom: 0px;margin-left: 0px;margin-top: 0px;height: 1680px;">
          <div class="sidenav-content-details">
          <h3 id="learning-title">Forex Benefits</h3>
          <img src ="{{asset('pictures/Benefits.jpg')}}" class="img-padding" >
          <h5>Benefits of Trading Forex</h5>
          <p>There are many benefits and advantages to trading Forex. Here are just a few reasons why so many people are choosing this market as a business opportunity:</p>
          <ol>
          <b class="l-size"><li>Leverage</li></b>
          In Forex trading, a small margin deposit can control a much larger total contract value. Leverage gives the trader the ability to make extraordinary profits and at the same time keep risk capital to a minimum. Some Forex firms offer 200 to 1 leverage, which means that a $50 dollar margin deposit would enable a trader to buy or sell $10,000 worth of currencies. Similarly, with $500 dollars, one could trade with $100,000 dollars and so on.
          <b class="l-size"><li>Liquidity</li></b>
          Because the Forex Market is so large, it is also extremely liquid. This means that with a click of a mouse you can instantaneously buy and sell at will. You are never 'stuck' in a trade. You can even set the online trading           platform to automatically close your position at your desired profit level (limit order), and/or close a trade if a trade is going against you (stop order).
          <b class="l-size"><li>Profit in Both "Rising" and "Falling" Markets</li></b>
          On the stock markets, you can only make money if shares are rising, but in economic recession and falling 'bear' markets, there is little chance of making big money. Forex is different. One of the most exciting advantages of FX trading is the ability to generate profits whether a currency pair is 'up' or 'down'. A trader can profit by taking a 'long' position, (buying the currency pair at one price and selling it later at a higher price), or a 'short' position, (selling the currency pair and buying it back at a lower price).
          <br><br>
          For example, if you think the US dollar will increase in value vs. the Japanese Yen then you will buy Dollars and sell Yen (go long). If you think the Yen will increase in value against the Dollar then you will sell Dollars and buy yen (go short). As long as the trader picks the right direction, a potential for profit always exists.
          <b class="l-size"><li>24 Hours</li></b>
          From Sunday evening to Friday Afternoon EST the Forex market never sleeps. This is very desirable for those who want to trade on a part-time basis, because you can choose when you want to trade--morning, noon or night.
          <b class="l-size"><li>Free "Demo" Accounts, News, Charts and Analysis</li></b>
          Most Online Forex firms offer free 'Demo' accounts to practice trading, along with breaking Forex news and charting services. These are very valuable resources for traders who would like to hone their trading skills with 'virtual' money before opening a live trading account.
          <b class="l-size"><li>"Mini" Trading</li></b>
          One might think that getting started as a currency trader would cost a lot of money. The fact is, it doesn't. Online Forex Firms now offer 'mini' trading accounts with a minimum account deposit of only $200-$500 with no commission trading. This makes Forex much more accessible to the average individual, without large, start-up capital.
          </ol>
          <p>*Adapted from "<b>The Day Trade Forex System: The ULTIMATE Step-By-Step Guide to Online Currency Trading</b>" by <b>Erol Bortucene and Cynthia Macy</b></p>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/elearning.js')}}"></script>   
@stop