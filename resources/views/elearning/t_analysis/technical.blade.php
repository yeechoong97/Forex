@extends('layouts.default')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">


<div style="margin: 20px;margin-bottom: 20px;margin-top: 130px;height: 680px;">
    <div class="row" style="height: 680px;margin-right: 0px;margin-left: 0px;">
        @include('elearning.side-nav')
        <div class="col-md-6 col-xl-10 offset-xl-0 sidenav-con" style="margin-bottom: 0px;margin-left: 0px;margin-top: 0px;height: 1680px;">
            <div class="sidenav-content-details">
            <h3 id="learning-title">Technical Analysis Introduction</h3>
            <img src ="{{asset('pictures/Technical.jpg')}}" class="img-padding" >
            <p>Formulating a trading plan should include the initial entry position, the risk management loss objective, and the targeted profit objective— in other words, everything about the trade from start to finish. The type of analysis you do should lead to a means to determine those three components of a trade before you ever get into it. For many traders, analyzing price data on a chart—technical analysis—is the solution. The emphasis here is how to understand and apply technical tools without the syndrome of analysis paralysis—that is, when too many studies are done, dominating the trader’s time and leading to inaction. It’s true that no one ever lost money by not trading, but if you are a trader or trying to trade, decisions must be made.</p>
            <p>How you proceed with your analysis may depend on your brain. An interesting concept of how the brains of individuals function, whether they are male or female, comes from research that shows that the left and the right sides of the brain interpret and process data differently. Determining which side of your brain is the dominant side may help you understand the form of market analysis that you might like to use.</p>
            <p>The left side of the brain is the logical, methodical reasoning, and rational thinking half. It is the side of the brain that facilitates dealings with the factual sciences and mathematics. A person who is left-brain dominant may relate to and place more emphasis and confidence in support and resistance levels derived from mathematical formulas such as pivot points and Fibonacci and technical indicators as well as cold, hard supply/demand reports or statistical data.</p>
            <p>The right side of the brain, according to researchers and doctors, is the artistic dominating side. If the right side of your brain dominates your thinking as a technical chart analyst, then you have a strong tendency to remember and recall chart patterns. You may put more confidence in repetitive chart pattern techniques and the ensuing theories of measurement techniques and methodologies behind these formations. For this kind of thinker, learning traditional chart patterns and Japanese candlestick formations may evolve to become a reasonable method to interpret and process data to act on trading decisions.</p>
            <p>Chart reading has fascinated traders for hundreds of years, even though it has never been totally accepted by academics and other market purists. Using charts to analyze markets and price movement is certainly not an exact science but, rather, a working form of art that sometimes depends more on what the eye sees than on a conclusive fact. It is absolutely essential that you develop at least the basic skills in the art of charting price moves if you want to become an astute trader, even if you are more comfortable trading based on fundamentals and facts.</p>
            <p>There are three main popular charting techniques: bar charts, point-andfigure charts, and candlestick charts. Another technique of charting or watching price patterns and the behavior of the market is market profiling. The importance of any type of charting is to help understand where market prices have been and, based on past historical reactions, to predict where prices may go in the future.</p>
            <p>Determining the trend or direction of prices is one of the main objectives of chart analysis. Pattern recognition leading up to a chart setup is another purpose of chart work. The more times you identify the characteristics of a pattern and the frequency it repeats itself, the more likely you will get the experience and confidence you need to follow the next similar pattern with a trading decision. The outcome from doing your work on the charts should be profits resulting from making the trade. If the pattern fails to produce the desired results, then you should be able to determine when to cut and run from the trade to avert a financial disaster.</p>
            <p>*Adapted from "<b>A Complete Guide to Technical Trading Tactics</b>" by <b>John L. Person</b></p>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/elearning.js')}}"></script>   
@stop