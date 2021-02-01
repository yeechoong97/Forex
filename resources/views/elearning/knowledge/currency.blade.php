@extends('layouts.default')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">


<div style="margin: 20px;margin-bottom: 20px;margin-top: 130px;height: 680px;">
    <div class="row" style="height: 680px;margin-right: 0px;margin-left: 0px;">
        @include('elearning.side-nav')
        <div class="col-md-6 col-xl-10 offset-xl-0 sidenav-con" style="margin-bottom: 0px;margin-left: 0px;margin-top: 0px;height: 1880px;">
            <div class="sidenav-content-details">
            <h3 id="learning-title">Currency Pair</h3>
            <p>A currency pair is the quotation of two different currencies, with the value of one currency being quoted against the other. The first listed currency of a currency pair is called the base currency, and the second currency is called the quote currency.</h5>
            <p>Currency pairs compare the value of one currency to another—the base currency (or the first one) versus the second, or the quote currency. It indicates how much of the quote currency is needed to purchase one unit of the base currency. Currencies are identified by an ISO currency code, or the three-letter alphabetic code they are associated with on the international market. So, for the U.S. dollar, the ISO code would be USD.</p>
            <img src ="{{asset('pictures/Currency.png')}}" class="img-padding" >
            <h5>The Basics of Currency Pairs</h5>
            <p>Trading of currency pairs are conducted in the foreign exchange market, also known as the forex market. It is the largest and most liquid market in the financial world. This market allows for the buying, selling, exchanging and speculation of currencies. It also enables conversion of currencies for international trade and investment. The forex market is open 24 hours a day, five days a week (except holidays), and sees a huge amount of trading volume.</p>
            <p>All forex trades involve the simultaneous purchase of one currency and sale of another, but the currency pair itself can be thought of as a single unit—an instrument that is bought or sold. If you buy a currency pair, you buy the base currency and implicitly sell the quoted currency. The bid (buy price) represents how much of the quote currency you need to get one unit of the base currency.</p>
            <p>Conversely, when you sell the currency pair, you sell the base currency and receive the quote currency. The ask (sell price) for the currency pair represents how much you will get in the quote currency for selling one unit of base currency.</p>
            <p>Unlike the stock or commodity market, you trade currencies, which means you're selling one currency to buy another. For stocks and commodities, you're using cash to buy an ounce of gold or one share of Apple stock. Economic data relating to currency pairs—interest rates, gross domestic product (GDP) information, major economic announcements—affect the prices of a trading pair.</p>
            <h5>Major Currency Pairs</h5>
            <p>A widely traded currency pair is the euro against the U.S. dollar, or shown as EUR/USD. In fact, it is the most liquid currency pair in the world because it is the most heavily traded. The quotation EUR/USD = 1.2500 means that one euro is exchanged for 1.2500 U.S. dollars. In this case, EUR is the base currency and USD is the quote currency (counter currency). This means that 1 euro can be exchanged for 1.25 U.S. dollars. Another way of looking at this is that it will cost you $125 to buy EUR 100.</p>
            <p>There are as many currency pairs as there are currencies in the world. The total number of currency pairs that exist changes as currencies come and go. All currency pairs are categorized according to the volume that is traded on a daily basis for a pair. The currencies that trade the most volume against the U.S. dollar are referred to as the major currencies. These include the EUR/USD, USD/JPY, GBP/USD, USD/CHF, AUD/USD and USD/CAD. The final two currency pairs are known as commodities currencies because both Canada and Australia are rich in commodities and both countries are affected by their prices.</p>
            <p>All of the major currency pairs have very liquid markets that trade 24 hours a day every business day, and they have very narrow spreads.</p>
            <h5>Minor and Exotic Pairs</h5>
            <p>Currency pairs that are not associated with the U.S. dollar are referred to as minor currencies or crosses. These pairs have slightly wider spreads and are not as liquid as the majors, but they are sufficiently liquid markets nonetheless. The crosses that trade the most volume are among the currency pairs in which the individual currencies are also majors. Some examples of crosses include the EUR/GBP, GBP/JPY and EUR/CHF.</p>
            <p>Exotic currencies pairs include currencies of emerging markets. These pairs are not as liquid, and the spreads are much wider. An example of an exotic currency pair is the USD/SGD (U.S. dollar/Singapore dollar).</p>
            <p>*Adapted from "<b>Currency Pair Definition</b>" by <b>Investopedia</b> (https://www.investopedia.com/terms/c/currencypair.asp)</p>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/elearning.js')}}"></script>   
@stop