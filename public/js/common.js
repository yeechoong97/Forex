//Accumulation Distribution Line (ADL)
function ADL() {
    mapping = dataTable.mapAs({ "high": 1, "open": 2, "low": 3, "close": 4, "volume": 5 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var adl = secondPlot.adl(mapping).series();
    adl.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    chart.scroller().line(mapping);
    setDecimalPlot2();
}

//Adaptive Moving Average
function AMA(obj) {
    mapping = dataTable.mapAs({ 'value': 4 });
    var ama = plot.ama(mapping, obj.period, obj.fast, obj.slow, obj.type).series();
    ama.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    chart.scroller().line(mapping);
}

//Aroon
function Aroon() {
    mapping = dataTable.mapAs({ "high": 2, "low": 3 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    secondPlot.aroon(mapping, 25);
}

//Average True Range
function ATR(obj) {
    mapping = dataTable.mapAs({ "high": 1, "open": 2, "low": 3, "close": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');

    var atr = secondPlot.atr(mapping, obj.period, obj.type).series();
    atr.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    atr.stroke('#bf360c');
    setDecimalPlot2();
}

//Awesome Oscillator
function AOscillator() {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');

    var ao = secondPlot.ao(mapping).series();
    ao.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    ao.stroke('#bf360c');
    setDecimalPlot2();
}

//Bollinger Bands
function BBands(obj) {
    mapping = dataTable.mapAs({ 'value': 4 });
    var bbands = plot.bbands(mapping, obj.period, obj.deviation, obj.type, obj.type, obj.type);
    bbands.upperSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    bbands.middleSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    bbands.lowerSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    bbands.rangeSeries().tooltip().format("{%seriesName}: " + "\n" + "High: {%high}{decimalsCount:5}" + "\n" + "Low: {%low}{decimalsCount:5}");
    setDecimalPlot1();
}

//Bollinger Bands %B
function BBandsB() {
    mapping = dataTable.mapAs({ 'value': 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    secondPlot.bbandsB(mapping);
}

//Bollinger Bands Width
function BBandsWidth() {
    mapping = dataTable.mapAs({ 'value': 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    secondPlot.bbandsWidth(mapping);
}

//Chaikin Money Flow (CMF)
function CMF() {
    mapping = dataTable.mapAs({ "high": 1, "low": 3, "close": 4, "volume": 5, "value": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var cmf = secondPlot.cmf(mapping).series();
    cmf.stroke("#bf360c")
}

//Chaikin Oscillator (CHO)
function CHO() {
    mapping = dataTable.mapAs({ "high": 1, "low": 3, "close": 4, "volume": 5, "value": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var cho = secondPlot.cho(mapping).series();
    cho.stroke("#bf360c")
}

//Commodity Channel Index (CCI)
function CCI(obj) {
    mapping = dataTable.mapAs({ "high": 1, "low": 3, "close": 4, "volume": 5, "value": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    secondPlot.cci(mapping, obj.period, obj.type).series();
}

//Directional Movement Index (DMI)
function DMI(obj) {
    mapping = dataTable.mapAs({ "high": 1, "low": 3, "close": 4, "volume": 5, "value": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    secondPlot.dmi(mapping, obj.period, obj.adx, obj.smooth, obj.type, obj.type, obj.type);
}

//Envelope (ENV)
function ENV(obj) {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var env = secondPlot.env(mapping, obj.period, obj.deviation, obj.ma, obj.type, obj.type);
    env.upperSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    env.lowerSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    setDecimalPlot2();
}

//Exponential Moving Average
function EMA(obj) {
    mapping = dataTable.mapAs({ 'value': 4 });
    var ema = plot.ema(mapping, obj.period, obj.type).series();
    ema.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
}

//Heikin-Ashi
function HA() {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var ha = secondPlot.ha(mapping).series();
    ha.tooltip().format("{%seriesName}: " + "\n" + "Open: {%open}{decimalsCount:5}" + "\n" + "High: {%high}{decimalsCount:5}" + "\n" + "Low: {%low}{decimalsCount:5}" + "\n" + "Close: {%close}{decimalsCount:5}")
    ha.legendItem().iconType('rising-falling');
    setDecimalPlot2();
}

//Ichimoku Cloud (IKH)
function IKH() {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var ikh = secondPlot.ikh(mapping);
    ikh.baseSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    ikh.conversionSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    ikh.laggingSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    ikh.leadingSeries().tooltip().format("{%seriesName}: " + "\n" + "High: {%high}{decimalsCount:5}" + "\n" + "Low: {%low}{decimalsCount:5}");
    setDecimalPlot2();
}

//KDJ
function KDJ() {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4, "value": 5 });
    var kdj = plot.kdj(mapping, 10, "EMA", 10, "SMA", 20);
    kdj.kSeries().stroke("#bf360c");
    kdj.dSeries().stroke("#02660c");
    kdj.jSeries().stroke("#0228b2");
}

//Keltner Channels
function KeltnerChannels() {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4, "value": 5 });
    var kel = plot.keltnerChannels(mapping);
    kel.maSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    kel.rangeSeries().tooltip().format("{%seriesName}: " + "\n" + "High: {%high}{decimalsCount:5}" + "\n" + "Low: {%low}{decimalsCount:5}");
    setDecimalPlot1();
}

//Modified Moving Average
function MMA(obj) {
    mapping = dataTable.mapAs({ 'value': 4 });
    var mma10 = plot.mma(mapping, obj.period, obj.type).series();
    mma10.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    mma10.stroke('#bf360c');
}

//Momentum
function Momentum(obj) {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4, "value": 5 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var momentum = secondPlot.momentum(mapping, obj.period, obj.type).series();
    momentum.stroke("2 red");
}

//Money Flow Index
function MFI() {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4, "volume": 5 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var mfi = secondPlot.mfi(mapping, 5).series();
    mfi.stroke("2 red");
}

//Moving Average Convergence Divergence (MACD)
function MACD(obj) {
    mapping = dataTable.mapAs({ 'value': 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    setDecimalPlot2();

    var macd = secondPlot.macd(mapping, obj.fast, obj.slow, obj.signal, obj.type, obj.type, obj.type2);
    macd.macdSeries().stroke('#bf360c');
    macd.macdSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    macd.signalSeries().stroke('#ff6d00');
    macd.signalSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    macd.histogramSeries().fill('#ffe082');
    macd.histogramSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
}

//On Balance Volume
function OBV() {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4, "volume": 5 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    secondPlot.obv(mapping);
}

//Parabolic SAR (PSAR)
function PSAR(obj) {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    var psar = plot.psar(mapping, obj.start, obj.increment, obj.max, obj.type).series();
    psar.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    psar.stroke("0.5 lightGray");
    setDecimalPlot1();
}

//Price Channels
function PriceChannels() {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    var pc = plot.priceChannels(mapping);
    pc.middleSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    pc.rangeSeries().tooltip().format("{%seriesName}: " + "\n" + "High: {%high}{decimalsCount:5}" + "\n" + "Low: {%low}{decimalsCount:5}");
}

//Price Oscillator indicator (PPO)
function PPO() {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var ppo = secondPlot.ppo(mapping);
    ppo.ppoSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    ppo.signalSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    ppo.histogramSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    setDecimalPlot2();
}

//Psychological Line (PSY)
function PSY() {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    secondPlot.psy(mapping);
}

//Rank Correlation Index (RCI)
function RCI() {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    secondPlot.rci(mapping);
}

//Rate of change
function ROC(obj) {
    mapping = dataTable.mapAs({ 'value': 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var roc14 = secondPlot.roc(mapping, obj.period, obj.type).series();
    roc14.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}")
    roc14.stroke('#bf360c');
    setDecimalPlot2();
}

//Relative Strength Index
function RSI(obj) {
    mapping = dataTable.mapAs({ 'value': 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var rsi14 = secondPlot.rsi(mapping, obj.period, obj.type).series();
    rsi14.stroke('#bf360c');
}

//Simple Moving Average
function SMA() {
    mapping = dataTable.mapAs({ 'value': 4 });
    var sma20 = plot.sma(mapping, 20).series();
    sma20.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}")
    sma20.stroke('#bf360c');
}

//Stochastic Oscillator
function Stochastic(obj) {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4, "value": 5 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var stochastic = secondPlot.stochastic(mapping, obj.period, obj.kma, obj.d, obj.ktype, obj.dtype, obj.type);
    stochastic_k = stochastic.kSeries();
    stochastic_k.stroke("#bf360c");
    stochastic_d = stochastic.dSeries();
    stochastic_d.stroke("#ff6d00");
}

//Triple Exponential Moving Average (TRIX)
function Trix() {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var trix = secondPlot.trix(mapping);
    trix.trixSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    trix.signalSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    setDecimalPlot2();
}

//Volume + Moving Average
function VolumeMA() {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4, "volume": 5 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    secondPlot.volumeMa(mapping);
}

//Williams %R
function WilliamsR(obj) {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.yAxis(1).orientation('right');
    var williamsR = secondPlot.williamsR(mapping, obj.period, obj.type).series();
    williamsR.stroke("2 red");
}

function setDecimalPlot2() {
    secondPlot.legend().itemsFormat(function() {
        var series = this.series;
        switch (series.getType()) {
            case "line":
            case "area":
            case "column":
            case "stick":
            case "marker":
                return series.name() + ": " + validateValue(this.value);
            case "candlestick":
            case "ohlc":
                return series.name() + ": " + "(O:" + validateValue(this.open) + " / " + "H:" + validateValue(this.high) + " / " + "L:" + validateValue(this.low) + " / " + "C:" + validateValue(this.close) + ")";
                break;
            case "range-area":
                return series.name() + ": (" + "H:" + validateValue(this.high) + ";" + "L:" + validateValue(this.low) + ")";
        }
    });
    secondPlot.yAxis(1, false)
}

function setDecimalPlot1() {
    plot.legend().itemsFormat(function() {
        var series = this.series;
        switch (series.getType()) {
            case "line":
            case "area":
            case "column":
            case "stick":
            case "marker":
                return series.name() + ": " + validateValue(this.value);
            case "candlestick":
            case "ohlc":
                return series.name() + ": " + "(O:" + validateValue(this.open) + " / " + "H:" + validateValue(this.high) + " / " + "L:" + validateValue(this.low) + " / " + "C:" + validateValue(this.close) + ")";
                break;
            case "range-area":
                return series.name() + ": (" + "H:" + validateValue(this.high) + ";" + "L:" + validateValue(this.low) + ")";
        }
    });
}

function validateValue(value) {
    var val = value;
    if (!isNaN(val)) {
        val = parseFloat(val).toFixed(5);
    }
    return val;
}


//Create annotations
function create() {
    var select = document.getElementById("typeSelect");
    if (select.value == "reset")
        removeAll();
    else
        plot.annotations().startDrawing(select.value);
}

// remove all annotations
function removeAll() {
    plot.annotations().removeAllAnnotations();
    document.getElementById("typeSelect").value = "default"
}

function removeSelected() {
    var selectedAnnotation = plot.annotations().getSelectedAnnotation();
    plot.annotations().removeAnnotation(selectedAnnotation);
}

//reset chart
function resetChart() {
    clearInterval(streaming);
    chart.plot(1).enabled(!chart.plot(1).enabled());
    chart.plot(1).dispose();
    while (chart.plot(0).getSeriesCount() > 1) {
        var count = 0;
        if (plot.getSeriesAt(count).name().includes("USD") == true || plot.getSeriesAt(count).name().includes("EUR") == true) {
            count = 1;
        }
        plot.removeSeriesAt(count);
    }
    document.getElementById('indicatorSelect').value = "default";
    removeAll();
    streaming = setInterval(stream, 1000);
    // setRemarks("EUR_USD");
    // changeSeries();
}

//Change the chart series according to the input
function changeSeries() {
    var series = document.getElementById('seriesSelect').value;
    var interval = document.getElementById('intervalSelect').value;
    var instrument = document.getElementById('instrumentSelect').value;
    $.ajax({
        type: 'POST',
        url: 'index/chart',
        data: {
            _token: token,
            series: series,
            interval: interval,
            instrument: instrument,
        },
        success: function(data) {
            clearInterval(streaming);
            changeChartSeries(series, data);
            streaming = setInterval(stream, 1000);
        }
    });
};


function changeChartSeries(chartSeries, data) {
    var index = 0;
    if (chart.plot(0).getSeriesCount() > 1) {
        var count = chart.plot(0).getSeriesCount();
        for (var i = 0; i < count; i++) {
            if (chart.plot(0).getSeriesAt(i).name().includes("USD") || chart.plot(0).getSeriesAt(i).name().includes("EUR")) {
                index = i;
                break;
            }
        }
    }
    plot.removeSeriesAt(index);
    dataTable.remove();
    dataTable.addData(data.response);
    if (chartSeries == "candlestick" || chartSeries == "ohlc") {
        mapping = dataTable.mapAs({ open: 1, high: 2, low: 3, close: 4 });
    } else {
        mapping = dataTable.mapAs({ value: 1 });
    }
    switch (chartSeries) {
        case "area":
            var series = chart.plot(0).area(mapping);
            series.stroke('purple');
            series.fill('#c778ff');
            break;
        case "line":
            var series = chart.plot(0).line(mapping);
            series.stroke('purple');
            break;
        case "stick":
            var series = chart.plot(0).stick(mapping);
            series.stroke('purple');
            break;
        case "column":
            var series = chart.plot(0).column(mapping);
            series.stroke('purple');
            series.fill('#c778ff');
            break;
        case "candlestick":
            var series = chart.plot(0).candlestick(mapping);
            series.legendItem().iconType('rising-falling');
            break;
        case "ohlc":
            var series = chart.plot(0).ohlc(mapping);
            series.legendItem().iconType('rising-falling');
            break;
    }
    var instrument = data.instrument;
    instrument = instrument.replace("_", "/");
    series.name(instrument);
    chart.title(instrument);
    chart.container('container');
    chart.draw();
}

function changeIndicator() {
    var tool = document.getElementById('indicatorSelect').value;
    if (tool == "reset")
        removeIndicator();
    else
        appendLightbox(tool);
}

function removeIndicator() {
    removeLowerIndicator();
    removeUpperIndicator();
    document.getElementById('indicatorSelect').value = "default";
}

function removeUpperIndicator() {
    while (chart.plot(0).getSeriesCount() > 1) {
        var count = 0;
        if (plot.getSeriesAt(count).name().includes("USD") == true || plot.getSeriesAt(count).name().includes("EUR") == true) {
            count = 1;
        }
        plot.removeSeriesAt(count);
    }
}

function removeLowerIndicator() {
    chart.plot(1).enabled(!chart.plot(1).enabled());
    chart.plot(1).dispose();
}