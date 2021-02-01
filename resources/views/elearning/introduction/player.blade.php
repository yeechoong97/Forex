@extends('layouts.default')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">


<div style="margin: 20px;margin-bottom: 20px;margin-top: 130px;height: 680px;">
    <div class="row" style="height: 680px;margin-right: 0px;margin-left: 0px;">
        @include('elearning.side-nav')
        <div class="col-md-6 col-xl-10 offset-xl-0 sidenav-con" style="margin-bottom: 0px;margin-left: 0px;margin-top: 0px;height: 1680px;">
          <div class="sidenav-content-details">
          <h3 id="learning-title">Forex Player Types</h3>
          <img src ="{{asset('pictures/PlayerTypes.png')}}" class="img-padding" >
          <h5>Types of Players</h5>
          <p>There are three main types of players in the forex market: customers, banks and brokers.</p>
          <h5>Customers</h5>
          <p>Customers can further be divided into individuals, small business and larger corporate type businesses. Corporate Businesses often need to make cross boarder transactions in order to trade their goods or services. Many companies have to import or exports goods to different countries all around the world. Payment for these goods and services may be made and received in different currencies.</p>
          <p>Many billions of dollars are exchanged daily to facilitate trade. The timing of those transactions can dramatically affect a company’s balance sheet. Although you may not think it, all of us play a part in today’s FX world. Every time someone goes on holiday overseas he or she normally needs to purchase that country’s currency and again change it bac into his/her own currency once he/she returns. Unwittingly he or she is in fact trading forex. He or she may also purchase goods and services whilst overseas and their credit card company has to convert those sales back into his base currency in order to charge him.</p>
          <h5>Banks</h5>
          <p>Under the heading bank we could also include the larger of the funds who are also deposit taking institutions. As a forex speculator you are actually taking the place of a bank for the duration of a trade, if you think about you are holding large amounts of foreign exchange just as a bank would. Policies that are implement by governments and central banks can play a major roll in the FX market. Central banks can play an important part in controlling the county’s money supply to insure financial stability.</p>
          <p>Large banks can literally trade billions of dollars daily. This can take the form of a service to their customers, trades executed on behalf of large clients or they themselves can speculate on the FX market. Because of the size of some transactions bank may be unable to deal directly with other banks and will state the price they are prepared to accept for a currency or pay for a currency. This is called market making.</p>
          <p>They will quote the buying or selling rates they are prepared to pay for pairs of currencies e.g. the Dollar to Japanese Yen (USD/JPY) or Pound to Dollar (GBP/USD). The market maker (in this case the bank) makes its profit from the difference between the buying and selling rate (spread).</p>
          <h5>Brokers</h5>
          <p>The broker’s main function is to facilitate trade between two parties. The normally have links to other brokers, banks and institutions and often become mini market makers themselves. Because of the varied source of clients who use brokers it is quite common to find the best rates through a broker as opposed to a bank.</p>
          <p>With a broker you can shop for the best rates in order to transact your business. The broker makes his commission from either the difference between the buying and selling rate or as a flat fee per transaction. All of the three main groups will also speculate in the market, which is why the market has so much volume and liquidity.</p>
          <p>*Adapted from "<b>Sure-Fire Forex Trading</b>" by <b>Mark McRae</b></p>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/elearning.js')}}"></script>   

@stop