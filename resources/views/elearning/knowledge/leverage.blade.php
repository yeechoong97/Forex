@extends('layouts.default')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">


<div style="margin: 20px;margin-bottom: 20px;margin-top: 130px;height: 680px;">
    <div class="row" style="height: 680px;margin-right: 0px;margin-left: 0px;">
        @include('elearning.side-nav')
        <div class="col-md-6 col-xl-10 offset-xl-0 sidenav-con" style="margin-bottom: 0px;margin-left: 0px;margin-top: 0px;height: 2980px;">
            <div class="sidenav-content-details">
            <h3 id="learning-title">Leverage & Margin</h3>
            <p>Margin and leverage are among the most important concepts to understand when trading forex. These essential tools allow forex traders to control trading positions that are substantially greater in size than would be the case without the use of these tools. At the most fundamental level, margin is the amount of money in a trader's account that is required as a deposit in order to open and maintain a leveraged trading position.</p>
            <h5>Margin</h5>
            <p>The margin is a performance bond, or good faith deposit, to ensure against the total loss of your account. Trade stations have margin management capabilities. In the event that funds in the account fall below margin requirements, the broker’s dealing desk will close all open positions. The prevents client’s accounts from falling into a negative balance, even in a highly volatile, fast moving market.</p>
            <p>The new NFA rule requires a minimum 1% margin at all time to maintain an open trade. (Note this may change from time to time so although we use 1% as the example at some stage in the future the margin maybe different. However using similar calculations one can easily calculate the new margins) Some deal stations automatically calculate this according to the formula and hence the margin requirements are continually varying.</p>
            <p>Based on a 1% margin requirement</p>
            <img src ="{{asset('pictures/MarginEg1.png')}}" class="img-padding" >
            <img src ="{{asset('pictures/MarginEg2.png')}}" class="img-padding" >
            <p>Some broker require $1,300 per lot in margin for EUR based pairs. In general, a margin of $1,300 allows you to control a $100,00 spot currency position. This is an efficient use of trading capital as the leverage in futures and stock markets is much less.</p>
            <h5>Leveraged Trading Position</h5>
            <p>Leverage simply allows traders to control larger positions with a smaller amount of actual trading funds. In the case of 50:1 leverage (or 2% margin required), for example, $1 in a trading account can control a position worth $50. As a result, leveraged trading can be a "double-edged sword" in that both potential profits as well as potential losses are magnified according to the degree of leverage used.</p>
            <p>To illustrate further, let's look at a typical USD/CAD (US dollar against Canadian dollar) trade. To buy or sell a 100,000 of USD/CAD without leverage would require the trader to put up $100,000 in account funds, the full value of the position. But with 50:1 leverage (or 2% margin required), for example, only $2,000 of the trader's funds would be required to open and maintain that $100,000 USD/CAD position.</p>
            <img src ="{{asset('pictures/Leverage.svg')}}" class="img-padding" >
            <p>While a margin amount of only 1/50th of the actual trade size is required from the trader to open this trade, however, any profit or loss on the trade would correspond to the full $100,000 leveraged amount. In the case of USD/CAD at the current market price, this would be a profit or loss of around $10 per one-pip move in price. This illustrates the magnification of profit and loss when trading positions are leveraged with the use of margin.</p>
            <p>Finally, it is important to note that in leveraged forex trading, margin privileges are extended to traders in good faith as a way to facilitate more efficient trading of currencies. As such, it is essential that traders maintain at least the minimum margin requirements for all open positions at all times in order to avoid any unexpected liquidation of trading positions.</p>
            <h5>Margin Call</h5>
            <p>Margin call is something that you will have to be aware of. If for any reason the broker thinks that your position is in danger e.g. you have a position of $100,00 with a margin of one percent ($1,000) and your losses are approaching your margin ($1,000). He will call you and either ask you to deposit more money, or close your position to limit your risk and his risk.</p>
            <p>Margin call is actually a good thing. It safeguards you and your broker. Some traders become so emotionally involved with their position that they are incapable of making a rational decision. If a margin call is exercised it will safeguard the trader from further losses. If you are going to trade on a margin account, it is imperative that you talk with your broker first to find out what their policies are on this type of accounts.</p>
            <p>*Adapted from "<b>Sure-Fire Forex Trading</b>" by <b>Mark McRae</b> , "<b>Forex System Research Forex Trading With Candlestick and Pattern</b>" by <b>Forex System Research Company</b> and "<b>Forex Margin and Leverage</b>" by <b>FOREX.com</b> (https://www.forex.com/en/education/resources-by-level/beginner/forex-margin-and-leverage/)</p>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/elearning.js')}}"></script>   
@stop