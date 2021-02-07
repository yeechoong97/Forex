@extends('layouts.default')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="elearning-container">
    <div class="row elearning-subcontainer">
        @include('elearning.side-nav')
        <div class="col-md-6 col-xl-10 offset-xl-0 sidenav-con" style="height: 3180px;">
            <div class="sidenav-content-details">
            <h3 id="learning-title">On-Balance Volume</h3>
            <p>On-balance volume (OBV) is a technical trading momentum indicator that uses volume flow to predict changes in stock price. Joseph Granville first developed the OBV metric in the 1963 book Granville's New Key to Stock Market Profits.</p>
            <p>Granville believed that volume was the key force behind markets and designed OBV to project when major moves in the markets would occur based on volume changes. In his book, he described the predictions generated by OBV as "a spring being wound tightly." He believed that when volume increases sharply without a significant change in the stock's price, the price will eventually jump upward or fall downward.</p>
            <img src ="{{asset('pictures/OBV.png')}}" class="img-padding" >
            <h5>The Formula for OBV is :</h5>
            <img src ="{{asset('pictures/OBVFormula.png')}}" class="img-padding" >
            <h5>Calculating OBV</h5>
            <p>On-balance volume provides a running total of an asset's trading volume and indicates whether this volume is flowing in or out of a given security or currency pair. The OBV is a cumulative total of volume (positive and negative). There are three rules implemented when calculating the OBV. They are:</p>
            <ol>
                <li>If today's closing price is higher than yesterday's closing price, then: Current OBV = Previous OBV + today's volume</li>
                <li>If today's closing price is lower than yesterday's closing price, then: Current OBV = Previous OBV - today's volume</li>
                <li>If today's closing price equals yesterday's closing price, then: Current OBV = Previous OBV</li>
            </ol>
            <h5>What Does On-Balance Volume Tell You?</h5>
            <p>The theory behind OBV is based on the distinction between smart money – namely, institutional investors – and less sophisticated retail investors. As mutual funds and pension funds begin to buy into an issue that retail investors are selling, volume may increase even as the price remains relatively level. Eventually, volume drives the price upward. At that point, larger investors begin to sell, and smaller investors begin buying.</h5>
            <p>Despite being plotted on a price chart and measured numerically, the actual individual quantitative value of OBV is not relevant. The indicator itself is cumulative, while the time interval remains fixed by a dedicated starting point, meaning the real number value of OBV arbitrarily depends on the start date. Instead, traders and analysts look to the nature of OBV movements over time; the slope of the OBV line carries all of the weight of analysis.</p>
            <p>Analysts look to volume numbers on the OBV to track large, institutional investors. They treat divergences between volume and price as a synonym of the relationship between "smart money" and the disparate masses, hoping to showcase opportunities for buying against incorrect prevailing trends. For example, institutional money may drive up the price of an asset, then sell after other investors jump on the bandwagon.</p>
            <h5>Example Of How To Use On-Balance Volume</h5>
            <p>Below is a list of 10 days' worth of a hypothetical stock's closing price and volume:</p>
            <ol>
                <li>Day one: closing price equals $10, volume equals 25,200 shares</li>
                <li>Day two: closing price equals $10.15, volume equals 30,000 shares</li>
                <li>Day three: closing price equals $10.17, volume equals 25,600 shares</li>
                <li>Day four: closing price equals $10.13, volume equals 32,000 shares</li>
                <li>Day five: closing price equals $10.11, volume equals 23,000 shares</li>
                <li>Day six: closing price equals $10.15, volume equals 40,000 shares</li>
                <li>Day seven: closing price equals $10.20, volume equals 36,000 shares</li>
                <li>Day eight: closing price equals $10.20, volume equals 20,500 shares</li>
                <li>Day nine: closing price equals $10.22, volume equals 23,000 shares</li>
                <li>Day 10: closing price equals $10.21, volume equals 27,500 shares</li>
            </ol>
            <p>As can be seen, days two, three, six, seven and nine are up days, so these trading volumes are added to the OBV. Days four, five and 10 are down days, so these trading volumes are subtracted from the OBV. On day eight, no changes are made to the OBV since the closing price did not change. Given the days, the OBV for each of the 10 days is:</p>
            <ol>
                <li>Day one OBV = 0</li>
                <li>Day two OBV = 0 + 30,000 = 30,000</li>
                <li>Day three OBV = 30,000 + 25,600 = 55,600</li>
                <li>Day four OBV = 55,600 - 32,000 = 23,600</li>
                <li>Day five OBV = 23,600 - 23,000 = 600</li>
                <li>Day six OBV = 600 + 40,000 = 40,600</li>
                <li>Day seven OBV = 40,600 + 36,000 = 76,600</li>
                <li>Day eight OBV = 76,600</li>
                <li>Day nine OBV = 76,600 + 23,000 = 99,600</li>
                <li>Day 10 OBV = 99,600 - 27,500 = 72,100</li>
            </ol>
            <h5>Limitations Of OBV</h5>
            <p>One limitation of OBV is that it is a leading indicator, meaning that it may produce predictions, but there is little it can say about what has actually happened in terms of the signals it produces. Because of this, it is prone to produce false signals. It can therefore be balanced by lagging indicators. Add a moving average line to the OBV to look for OBV line breakouts; you can confirm a breakout in the price if the OBV indicator makes a concurrent breakout.</p>
            <p>Another note of caution in using the OBV is that a large spike in volume on a single day can throw off the indicator for quite a while. For instance, a surprise earnings announcement, being added or removed from an index, or massive institutional block trades can cause the indicator to spike or plummet, but the spike in volume may not be indicative of a trend.</p>
            <p>*Adapted from <b>Hayes, A. (2020b). On-Balance Volume (OBV) Definition. https://www.investopedia.com/terms/o/onbalancevolume.asp</b></p>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/elearning.js')}}"></script>   
@stop