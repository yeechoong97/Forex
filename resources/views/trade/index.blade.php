@extends('layouts.default')
@section('content')
<?php
use App\Common;
?>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />

<body style="overflow-x:hidden">
<div class="upper-container">
    <div class="row upper-row-container" >
        <div class="col-md-6 col-xl-10 offset-xl-0 chart-section" >
            <div class="chart-container-btn">
                <select class="form-control col-md-2" style="max-width:11%" id="typeSelect" onchange="createAnnotation()">
                    <option value="default" selected disabled>Annotation</option>
                    <option value="reset">Reset Annotation</option>
                    @foreach(Common::$annotation as $key=> $value)
                    <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <select class="form-control col-md-1" style="max-width:11%" id="seriesSelect" onchange ="changeSeries()">
                    @foreach(Common::$series as $key=> $value)
                    <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <select class="form-control col-md-1" style="max-width:11%" id="intervalSelect" onchange ="changeSeries()">
                    @foreach(Common::$interval as $key=> $value)
                    <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <select class="form-control col-md-2" style="max-width:13%"  id="indicatorSelect" onchange ="changeIndicator()">
                    <option value="default" selected disabled>Add Indicator</option>
                    <option value="reset">Reset Indicator</option>
                    @foreach(Common::$indicator as $key=> $value)
                    <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <input type="hidden" id="hidden_upper_indicator" value=""/>
                <input type="hidden" id="hidden_lower_indicator" value="" />
                <button class="form-control col-md-1 reset-btn" onclick="resetChart()">Reset</button>
                <button class="form-control" style="width:40px" id="remove-annotation-intro" onclick="removeSelectedAnnotation()"><i class="fas fa-trash-alt"></i></button>
                <div class="question-btn" id="chart-tips-intro">
                    <i class="far fa-question-circle text-info" onclick="showChartTips()"></i>
                </div>

                <div class="f_control col-md-1 spread_order_button">
                    <a href="#" class="spread_btn">
                        <span class="span-title-spread">SPREAD</span>
                        <span class="span-data" id="pips-action"></span>
                    </a>
                </div>

                <div class="f_control col-md-1 buy_order_button" id="buy" data-toggle="modal" data-target="#buy-sell-modal" onclick="openLightbox('buy')">
                    <a href="#" class="buy_btn">
                        <span class="span-title-buy">BUY</span>
                        <span class="span-data" id="buy-action"></span>
                    </a>
                </div>

                <div class="f_control col-md-1 sell_order_button " id="sell" data-toggle="modal" data-target="#buy-sell-modal" onclick="openLightbox('sell')">
                    <a href="#" class="sell_btn">
                        <span class="span-title-sell">SELL</span>
                        <span class="span-data" id="sell-action"></span>
                    </a>
                </div>
            </div>
        <div id="container" class="chart-section-container bg-white rounded shadow loading"></div>
        <input type="hidden" value="EUR_USD" id="instrumentSelect"/>
    </div>
        <div class="col-md-6 col-xl-2 offset-xl-0 account-section">
            <div class="row account">
                <div class="mx-auto bg-white rounded shadow customization">
                    <div class="table-responsive account-table" id="account_table">
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th colspan="2" class="col" >Account Details &ensp;<i class="far fa-question-circle" onclick="showAccountTips()"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="currency-intro">
                                    <td>Currency :</td>
                                    <td>USD</td>
                                </tr>
                                <tr id="balance-intro">
                                    <td>Balance :</td>
                                    <td>${{$account->balance}}</td>
                                </tr>
                                <tr  id="margin-intro">
                                    <td>Margin :</td>
                                    <td id="account-margin">${{$account->margin}}</td>
                                </tr>
                                <tr id="margin-used-intro">
                                    <td>Margin Used :</td>
                                    <td id="account-margin-used">{{$account->margin_used}} %</td>
                                </tr>
                                <tr id="leverage-intro">
                                    <td>Leverage :</td>
                                    <td id="account-leverage">{{$account->leverage}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="lower-container">
    <div class="row lower-row-container" >
        <div class="col-md-6 col-xl-10 offset-xl-0 order-section">
            <div class="row order">
                <div class="mx-auto bg-white rounded shadow order-customization">
                    <div class="order-table table-responsive" id="table_all_orders">
                        <table class="table-fixed table" id="all_orders">
                            <thead>
                            <tr>
                                <th class="col1" id="ticket-intro">TicketID</th>
                                <th class="col2" id="date-intro">Date</th>
                                <th class="col1" id="pair-intro">Pair</th>
                                <th class="col1" id="units-intro">Units</th>
                                <th class="col1" id="type-intro">Type</th>
                                <th class="col1" id="margin-order-intro">Margin</th>
                                <th class="col1" id="price-intro">Price</th>
                                <th class="col1" id="current-intro">Current</th>
                                <th class="col1" id="profit-usd-intro">Profit (USD)</th>
                                <th class="col2" id="profit-spread-intro">Profit (Spread)</th>
                                <th class="col1" id="profit-intro">Profit (%)</th>
                                <th class="col1" id="action-intro">Action <i class="far fa-question-circle" onclick="showOrderTips()"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($account->order as $record)
                                <tr>
                                    <td class="col1">{{$record->ticketID}}</td>
                                    <td class="col2">{{$record->created_at->toDateString()}}</td>
                                    <td class="col1">{{$record->pair}}</td>
                                    <td class="col1">{{$record->available_units}}</td>
                                    <td class="col1">{{$record->type}}</td>
                                    <td class="col1">{{$record->margin}}</td>
                                    <td class="col1">{{$record->entry_price}}</td>
                                    <td class="col1"></td>
                                    <td class="col1"></td>
                                    <td class="col2"></td>
                                    <td class="col1"></td>
                                    <td class="col1"><a class="close_position" data-toggle="modal" data-target="#reduce-close-modal" onclick="openOrderBox('{{$record->ticketID}}',100)"><span class="far fa-times-circle"></span></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2 offset-xl-0 price-section">
            <div class="price-container bg-white rounded shadow mx-auto">
                <div class="header">
                    <h6>Rates &ensp;<i class="far fa-question-circle" onclick="showRateTips()"></i></h6>
                </div>
                <div class="price mx-auto" >
                    <div class="rates rate-active" id="EUR_USD_div">
                        <div class="header" id="EUR_USD_header" onclick="changeInstrument('EUR_USD')">EUR/USD <span class="fas fa-check-circle" id="EUR_USD_span"></span></div>
                            <div class="rates-container">
                                <div class="sell-rates" id="EUR_USD_Sell" ></div>
                                <div class="buy-rates" id="EUR_USD_Buy" ></div>
                            </div>
                        <div class="pips" id="EUR_USD_Pips" ></div>
                    </div>
                </div>
                <div class="price mx-auto">
                    <div class="rates" id="AUD_USD_div">
                        <div class="header" id="AUD_USD_header" onclick="changeInstrument('AUD_USD')">AUD/USD <span class="fas fa-check-circle" id="AUD_USD_span" style="display:none"> </div>
                            <div class="rates-container">
                                <div class="sell-rates" id="AUD_USD_Sell"></div>
                                <div class="buy-rates" id="AUD_USD_Buy"></div>
                            </div>
                        <div class="pips" id="AUD_USD_Pips"></div>
                    </div>
                </div>
                <div class="price mx-auto">
                    <div class="rates" id="GBP_USD_div">
                        <div class="header" id="GBP_USD_header" onclick="changeInstrument('GBP_USD')">GBP/USD <span class="fas fa-check-circle" id="GBP_USD_span" style="display:none"></div>
                            <div class="rates-container">
                                <div class="sell-rates" id="GBP_USD_Sell"></div>
                                <div class="buy-rates" id="GBP_USD_Buy"></div>
                            </div>
                        <div class="pips" id="GBP_USD_Pips"></div>
                    </div>
                </div>
                <div class="price mx-auto">
                    <div class="rates" id="USD_JPY_div">
                        <div class="header" id="USD_JPY_header" onclick="changeInstrument('USD_JPY')">USD/JPY<span class="fas fa-check-circle" id="USD_JPY_span" style="display:none"></div>
                            <div class="rates-container">
                                <div class="sell-rates" id="USD_JPY_Sell"></div>
                                <div class="buy-rates" id="USD_JPY_Buy"></div>
                        </div>
                        <div class="pips" id="USD_JPY_Pips"></div>
                    </div>
                </div>
                <div class="price mx-auto">
                    <div class="rates" id="EUR_JPY_div">
                        <div class="header" id="EUR_JPY_header" onclick="changeInstrument('EUR_JPY')">EUR/JPY <span class="fas fa-check-circle" id="EUR_JPY_span" style="display:none"></div>
                            <div class="rates-container">
                                <div class="sell-rates" id="EUR_JPY_Sell"></div>
                                <div class="buy-rates" id="EUR_JPY_Buy"></div>
                        </div>
                        <div class="pips" id="EUR_JPY_Pips"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="indicator-lightbox"></div>
<div class="preloader">
  <img src="https://raw.githubusercontent.com/maximakymenko/page-preloader-tutorial/1a6d6ceb32d501dd02fb2ebcd840c1d2e6f9c202/spinner.svg" alt="spinner">
</div>
@include('subpage.close-lightbox')
@include('subpage.order-lightbox')

</body>
<script type="text/javascript" src="{{ URL::asset('js/common.js') }}"></script>   
<script type="text/javascript" src="{{ URL::asset('js/home.js') }}"></script>
<script src="https://mighty-headland-26950.herokuapp.com/socket.io/socket.io.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/socket.js') }}"></script>   
<script type="text/javascript">

const preloader = document.querySelector('.preloader');
const fadeEffect = setInterval(() => {
        if (!preloader.style.opacity) {
            preloader.style.opacity = 1;
        }
        if (preloader.style.opacity > 0) {
            preloader.style.opacity -= 0.1;
        } else {
            clearInterval(fadeEffect);
            preloader.style.display = "none";
        }
        }, 100);

document.addEventListener('DOMContentLoaded', (event) => {fadeEffect});

//Append Temporary Data into Table
    let arrayInstrument = [];
@foreach($tempData as $key=>$value)
    var tempArray = [];
    @foreach($value as $id => $info)
        tempArray.push("{{$info}}");
    @endforeach
    arrayInstrument.push(tempArray);
@endforeach
appendTempData(arrayInstrument);



//Plot Chart
const token = $('meta[name="csrf-token"]').attr('content');
var mapping,secondPlot,chartStreaming;
let chartData = [];

var tempChartData = "{{$data}}";
var tempChartArray = tempChartData.split(",");
for(var i = 0;i<tempChartArray.length;i++)
{
    resultArray = [tempChartArray[i],parseFloat(tempChartArray[i+1]),parseFloat(tempChartArray[i+2]),parseFloat(tempChartArray[i+3]),parseFloat(tempChartArray[i+4]),parseInt(tempChartArray[i+5])];
    chartData.push(resultArray);
    i += 5;
}

var chart = anychart.stock();
var plot = chart.plot(0);
var dataTable = anychart.data.table();

//Stop the ajax and socket before refresh
window.onbeforeunload = () => {
    clearInterval(chartStreaming);
    socket.off();
}

anychart.onDocumentReady(function ()
{
    dataTable.addData(chartData);
    mapping = dataTable.mapAs({open: 1, high: 2, low: 3, close: 4 });

    // map loaded data for the scroller
    var scrollerMapping = dataTable.mapAs();
    scrollerMapping.addField('value', 5);

    // set grid settings
    plot.yGrid(true).xGrid(true).yMinorGrid(true).xMinorGrid(true);
    // set the legend for stock chart
    plot.legend().itemsFormat(
    "{%seriesName}: {%value}{decimalsCount:6}" +
        "{%open} ,{%high},{%low},{%close})"
    );
    //set the label of legend
    plot.legend().itemsFormat(function() {
    var series = this.series;
    switch(series.getType()){
        case "line":
        case "area":
        case "column":
            return  series.name()+ ": " + validateValue(this.value);
            break;
        case "candlestick":
        case "ohlc":
            return series.name()   + ": " +  "(O:" + this.open + " / "+ "H:" + this.high + " / " + "L:" +  this.low + " / "+ "C:" + this.close + ")";
            break;
    }
    });

    var series = plot.candlestick(mapping);
    var instrument = "{{$instrument}}";
    instrument = instrument.replace("_","/");
    series.name(instrument);
    chart.title({
        enabled : true,
        text: `${instrument}`,
        fontSize: 24,
        fontWeight: 'bold',
        fontFamily: 'San Serif',
        align: "right",
        margin: {
            top: -10,
            bottom: -40,
        }
    });

    series.legendItem().iconType('rising-falling');
    chart.scroller().candlestick(mapping);
    chart.crosshair().displayMode("float");
    chart.container('container');
    chart.draw(true);

    chart.listen("annotationDrawingFinish", function(){
    document.getElementById("typeSelect").value = "default";
    });

    //chartStreaming = setInterval(streamChart, 1000);
});

//Updating chart
function streamChart() {
        let seriesSelected = document.getElementById('seriesSelect').value;
        let intervalSelected = document.getElementById('intervalSelect').value;
        let instrumentSelected = document.getElementById('instrumentSelect').value;
        let chartObject = {interval: intervalSelected , instrument: instrumentSelected};
        $.ajax({
            type:'POST',
            url:'index/data',
            data: {
                _token:token,
                chartObject : chartObject
            },
            success:function(data) {
                dataTable.addData(data.response);
        }});
};

function checkTools(indicatorSelected,obj)
{
    let seriesCheck = chart.getPlotsCount();
    let status = false;
    let upperArray = ["BBands","EMA","PSAR","SMA"];
    for(let i in upperArray)
    {
        if(indicatorSelected == upperArray[i])
        {
            status = true;
            break;
        }
    }
    if(seriesCheck==1)
    {
        var upperCheck = chart.plot(0).getSeriesCount();
        if(upperCheck>1 && status==true)
            removeUpperIndicator();
    }
    else if (seriesCheck ==2)
    {
        var upperCheck = chart.plot(0).getSeriesCount();
        if(upperCheck>1 && status==true)
            removeUpperIndicator();
        else 
        {
            if(upperCheck=1 && status==false)
                removeLowerIndicator();
            else
                removeUpperIndicator();
        }
    }

    @foreach(Common::$indicatorFunc as $key=> $value)
        if (indicatorSelected == "{{$key}}")
        {
            eval("{{$value}}");
            document.getElementById('indicatorSelect').value = "default";
            document.getElementById('{!!$key!!}-exit-modal').click();
        }
    @endforeach
}


//Append Tutorial
window.onload = function(){ 
    var loginTime = "{{Session::get('login')}}";
    var userName = "{{$account->user->name}}";
    var tutorialValidate = "{{$account->user->tutorial}}";
    if(tutorialValidate == 0 && loginTime == 0)
    {
        showTutorial(userName);
        document.querySelector('.introjs-skipbutton').style.display="none";
    }
} 

function appendLightbox(tool)
{
    let toolList = [
        {title: "MACD", view: `@include('subpage_indicator.macd-lightbox')`},
        {title: "RSI", view: `@include('subpage_indicator.rsi-lightbox')`},
        {title: "BBands", view: `@include('subpage_indicator.bollinger-lightbox')`},
        {title: "Stochastic", view: `@include('subpage_indicator.stochastic-lightbox')`},
        {title: "Momentum", view: `@include('subpage_indicator.momentum-lightbox')`},
        {title: "ROC", view: `@include('subpage_indicator.roc-lightbox')`},
        {title: "WilliamsR", view: `@include('subpage_indicator.william-lightbox')`},
        {title: "CCI", view: `@include('subpage_indicator.cci-lightbox')`},
        {title: "PSAR", view: `@include('subpage_indicator.psar-lightbox')`},
        {title: "DMI", view: `@include('subpage_indicator.dmi-lightbox')`},
        {title: "ATR", view: `@include('subpage_indicator.atr-lightbox')`},
        {title: "EMA", view: `@include('subpage_indicator.ema-lightbox')`},
        {title: "SMA", view: `@include('subpage_indicator.sma-lightbox')`},
        {title: "ADL", view: `@include('subpage_indicator.adl-lightbox')`},
        {title: "OBV", view: `@include('subpage_indicator.obv-lightbox')`},
        {title: "MFI", view: `@include('subpage_indicator.mfi-lightbox')`},
        {title: "Aroon", view: `@include('subpage_indicator.aroon-lightbox')`}
    ];

    for (let index in toolList)
    {
        if (toolList[index].title === tool)
        document.getElementById('indicator-lightbox').innerHTML = toolList[index].view;
    }    
    toggleLightboxIndicator(tool);
    appendIndicatorEvent(tool);
}
</script>
@stop