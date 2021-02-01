@extends('layouts.default')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">


<div style="margin: 20px;margin-bottom: 20px;margin-top: 130px;height: 680px;">
    <div class="row" style="height: 680px;margin-right: 0px;margin-left: 0px;">
        @include('elearning.side-nav')
        <div class="col-md-6 col-xl-10 offset-xl-0 sidenav-con" style="margin-bottom: 0px;margin-left: 0px;margin-top: 0px;height: 1380px;">
          <div class="sidenav-content-details">
          <h3 id="learning-title">Introduction to Forex Market</h3>
          <img src ="{{asset('pictures/ForexImg.jpg')}}" class="img-padding" >
          <p>The foreign exchange market is perhaps the most interesting of all markets, as it is one of the few markets where the sheer size of the market makes it almost imposssible for any person, institution or government to control. The word FOREX is derived from Foreign Exchange and is the largest financial market in the world. Unlike many markets the FX market is open 24 hours per day and has an estimated $1.2 Trillion in turnover every day.</p>
          <p>This tremendous turnover is more than the combined turnover of the New York and London Stock Exchange on any given day. This tends to lead to a very liquid market and is therefore a desirable market to trade. The foreign exchange market allows customers, fund managers and banks to buy and sell foreign exchange on a global basis. The trade of goods, services, loans and speculation leads to a very active market. With the introduction of the mini account, deals can be anything from a few thousand dollars to billions of dollars.</p>
          <p>Forex has no centralized market, unlike many other securities. There is no single centralized place for the trade of forex. Traders buy and sell forex via telephones and computers linked to brokers, bank and other traders around the world. You will often hear the term <b class="l-size">INTERBANK</b> discussed in forex terminology. This originally, as the name implies, was simply, banks and large institutions exchanging information about the current rate of exchange at which their clients or themselves were prepared to buy or sell a currency. <b class="l-size">INTER</b> meaning between and <b class="l-size">Bank</b> meaning deposit-taking institutions – normally made up of banks, large institution, brokers or even the government.</p>
          <p>The market has moved on to such a degree now that the term interbank now means anybody who is prepared to buy or sell a currency. It could be two individuals or your local travel agent offering to exchange Euros for US Dollars. You will however find that most of the brokers and banks use centralized feeds to insure reliability of quote. The quotes for Bid (buy) and Offer (sell) you see will most always be from the larger players in the market. </p>
          <p>London in the United Kingdom is the single largest center for the exchange of forex. The main reasons that London has a higher percentage of trade is that it has always been a financial center and also because of time zones. The London market start between 7am and 8am, which is the end of the trading day for Asia. Just as the Banks in London are beginning to open at 8am they can deal with other traders in Tokyo, Hong Kong or Singapore whose trading day is just coming to a close.</p>
          <p>*Adapted from "<b>Sure-Fire Forex Trading</b>" by <b>Mark McRae</b></p>
        </div>
        </div>
    </div>
</div>

    <!-- <div class="sidenav">
      <div class="sidenav-menu">
          <a class="dropdown-btn" href="#about">Introduction</a>
              <div class="dropdown-container">
                  <a href="#">Link 1</a>
                  <a href="#">Link 2</a>
                  <a href="#">Link 3</a>
              </div>
          <a class="dropdown-btn" href="#services">Services</a>
          <a class="dropdown-btn" href="#clients">Clients<i class="fas fa-plus"></i></a>
              <div class="dropdown-container">
                  <a href="#">Link 1</a>
                  <a href="#">Link 2</a>
                  <a href="#">Link 3</a>
              </div>
          <a class="dropdown-btn" href="#contact">Contact<i class="fas fa-plus"></i></a>
              <div class="dropdown-container">
                  <a href="#">Link 1</a>
                  <a href="#">Link 2</a>
                  <a href="#">Link 3</a>
              </div>
          <a class="dropdown-btn" href="#contact">Search</a>
      </div>
    </div> -->

<!-- <div class="sidebar-content">
  <div class="sidenav-content-details">
  <h2>Sidebar Dropdown</h2>
  <p>Click on the dropdown button to open the dropdown menu inside the side navigation.</p>
  <p>This sidebar is of full height (100%) and always shown.</p>
  <p>Some random text..</p>
</div>
</div> -->
<script type="text/javascript" src="{{ URL::asset('js/elearning.js')}}"></script>   

@stop