//Accumulation Distribution Line (ADL)
function ADL(chartParameter) {
    mapping = dataTable.mapAs({ "high": 1, "open": 2, "low": 3, "close": 4, "volume": 5 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    var adl = secondPlot.adl(mapping, chartParameter.type).series();
    adl.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    setDecimalPlot2();
}

//Aroon
function Aroon(chartParameter) {
    mapping = dataTable.mapAs({ "high": 2, "low": 3 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.aroon(mapping, chartParameter.period, chartParameter.type);
}

//Average True Range
function ATR(chartParameter) {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');

    var atr = secondPlot.atr(mapping, chartParameter.period, chartParameter.type).series();
    atr.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    atr.stroke('#bf360c');
    setDecimalPlot2();
}

//Bollinger Bands
function BBands(chartParameter) {
    mapping = dataTable.mapAs({ "value": 4 });
    var bbands = plot.bbands(mapping, chartParameter.period, chartParameter.deviation, chartParameter.type, chartParameter.type, chartParameter.type);
    bbands.upperSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    bbands.middleSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    bbands.lowerSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    bbands.rangeSeries().tooltip().format("{%seriesName}: " + "\n" + "High: {%high}{decimalsCount:5}" + "\n" + "Low: {%low}{decimalsCount:5}");
    setDecimalPlot1();
}

//Commodity Channel Index (CCI)
function CCI(chartParameter) {
    mapping = dataTable.mapAs({ "high": 1, "low": 3, "close": 4, "value": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.cci(mapping, chartParameter.period, chartParameter.type).series();
}

//Directional Movement Index (DMI)
function DMI(chartParameter) {
    mapping = dataTable.mapAs({ "high": 1, "open": 2, "low": 3, "close": 4, "value": 4, "volume": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.dmi(mapping, chartParameter.period, chartParameter.adx, chartParameter.smooth, chartParameter.type, chartParameter.type, chartParameter.type);
}

//Exponential Moving Average
function EMA(chartParameter) {
    mapping = dataTable.mapAs({ "value": 4 });
    var ema = plot.ema(mapping, chartParameter.period, chartParameter.type).series();
    ema.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
}


//Momentum
function Momentum(chartParameter) {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    var momentum = secondPlot.momentum(mapping, chartParameter.period, chartParameter.type).series();
    momentum.stroke("2 red");
}

//Money Flow Index
function MFI(chartParameter) {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4, "volume": 5 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    var mfi = secondPlot.mfi(mapping, chartParameter.period, chartParameter.type).series();
    mfi.stroke("2 red");
}

//Moving Average Convergence Divergence (MACD)
function MACD(chartParameter) {
    mapping = dataTable.mapAs({ "value": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    setDecimalPlot2();

    var macd = secondPlot.macd(mapping, chartParameter.fast, chartParameter.slow, chartParameter.signal, chartParameter.type, chartParameter.type, chartParameter.type2);
    macd.macdSeries().stroke('#bf360c');
    macd.macdSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    macd.signalSeries().stroke('#ff6d00');
    macd.signalSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    macd.histogramSeries().fill('#ffe082');
    macd.histogramSeries().tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
}

//On Balance Volume
function OBV(chartParameter) {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4, "volume": 5 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    secondPlot.obv(mapping, chartParameter.type);
}

//Parabolic SAR (PSAR)
function PSAR(chartParameter) {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    var psar = plot.psar(mapping, chartParameter.start, chartParameter.increment, chartParameter.max, chartParameter.type).series();
    psar.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}");
    psar.stroke("0.5 lightGray");
    setDecimalPlot1();
}

//Rate of change
function ROC(chartParameter) {
    mapping = dataTable.mapAs({ "value": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    var roc14 = secondPlot.roc(mapping, chartParameter.period, chartParameter.type).series();
    roc14.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}")
    roc14.stroke('#bf360c');
    setDecimalPlot2();
}

//Relative Strength Index
function RSI(chartParameter) {
    mapping = dataTable.mapAs({ "value": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    var rsi14 = secondPlot.rsi(mapping, chartParameter.period, chartParameter.type).series();
    rsi14.stroke('#bf360c');
}

//Simple Moving Average
function SMA(chartParameter) {
    mapping = dataTable.mapAs({ "value": 4 });
    var sma = plot.sma(mapping, chartParameter.period, chartParameter.type).series();
    sma.tooltip().format("{%seriesName}: {%value}{decimalsCount:5}")
    sma.stroke('#bf360c');
}

//Stochastic Oscillator
function Stochastic(chartParameter) {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4, "value": 5 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    var stochastic = secondPlot.stochastic(mapping, chartParameter.period, chartParameter.kma, chartParameter.d, chartParameter.ktype, chartParameter.dtype, chartParameter.type);
    stochastic_k = stochastic.kSeries();
    stochastic_k.stroke("#bf360c");
    stochastic_d = stochastic.dSeries();
    stochastic_d.stroke("#ff6d00");
}

//Williams %R
function WilliamsR(chartParameter) {
    mapping = dataTable.mapAs({ "open": 1, "high": 2, "low": 3, "close": 4 });
    secondPlot = chart.plot(1);
    secondPlot.height('30%');
    var williamsR = secondPlot.williamsR(mapping, chartParameter.period, chartParameter.type).series();
    williamsR.stroke("2 red");
}


//Chat Configuration for Lower Chart
function setDecimalPlot2() {
    secondPlot.legend().itemsFormat(function() {
        let series = this.series;
        switch (series.getType()) {
            case "line":
            case "area":
            case "column":
            case "stick":
            case "marker":
                return series.name() + ": " + validateValue(this.value);
                break;
            case "candlestick":
            case "ohlc":
                return series.name() + ": " + "(O:" + validateValue(this.open) + " / " + "H:" + validateValue(this.high) + " / " + "L:" + validateValue(this.low) + " / " + "C:" + validateValue(this.close) + ")";
                break;
            case "range-area":
                return series.name() + ": (" + "H:" + validateValue(this.high) + ";" + "L:" + validateValue(this.low) + ")";
                break;
        }
    });
    secondPlot.yAxis(1, false)
}

//Chat Configuration for Upper Chart
function setDecimalPlot1() {
    plot.legend().itemsFormat(function() {
        let series = this.series;
        switch (series.getType()) {
            case "line":
            case "area":
            case "column":
            case "stick":
            case "marker":
                return series.name() + ": " + validateValue(this.value);
                break;
            case "candlestick":
            case "ohlc":
                return series.name() + ": " + "(O:" + validateValue(this.open) + " / " + "H:" + validateValue(this.high) + " / " + "L:" + validateValue(this.low) + " / " + "C:" + validateValue(this.close) + ")";
                break;
            case "range-area":
                return series.name() + ": (" + "H:" + validateValue(this.high) + ";" + "L:" + validateValue(this.low) + ")";
                break;
        }
    });
}

//Parse the value into 5 decimals
function validateValue(value) {
    if (!isNaN(value))
        return parseFloat(value).toFixed(5);
}

//Create annotations
function createAnnotation() {
    var annotationType = document.getElementById("typeSelect");
    if (annotationType.value === "reset")
        removeAllAnnotations();
    else
        plot.annotations().startDrawing(annotationType.value);
}

// remove all annotations
function removeAllAnnotations() {
    plot.annotations().removeAllAnnotations();
    document.getElementById("typeSelect").value = "default"
}

// Remove selected annotation
function removeSelectedAnnotation() {
    var selectedAnnotation = plot.annotations().getSelectedAnnotation();
    plot.annotations().removeAnnotation(selectedAnnotation);
}

//reset chart
function resetChart() {
    clearInterval(chartStreaming);
    removeIndicator();
    removeAllAnnotations();
    chartStreaming = setInterval(streamChart, 1000);
}

//Change the chart series according to the input
function changeSeries() {
    let seriesSelected = document.getElementById('seriesSelect').value;
    let intervalSelected = document.getElementById('intervalSelect').value;
    let instrumentSelected = document.getElementById('instrumentSelect').value;
    let chartObject = { interval: intervalSelected, instrument: instrumentSelected };
    $.ajax({
        type: 'POST',
        url: 'index/chart',
        data: {
            _token: token,
            chartObject: chartObject,
        },
        success: function(data) {
            clearInterval(chartStreaming);
            changeChartSeries(seriesSelected, data);
            chartStreaming = setInterval(streamChart, 1000);
        }
    });
};

//Change the chart series/interval/instrument based on input
function changeChartSeries(chartSeries, data) {
    let removePlotIndex = 0;
    let countPlot = chart.plot(0).getSeriesCount();
    if (countPlot > 1) {
        for (let index = 0; index < countPlot; index++) {
            let upperChartPlot = chart.plot(0).getSeriesAt(index).name();
            // console.log(upperChartPlot);
            if (upperChartPlot.includes("USD") || upperChartPlot.includes("EUR")) {
                removePlotIndex = index;
                break;
            }
        }
    }
    plot.removeSeriesAt(removePlotIndex);
    dataTable.remove();
    var chartData = [];
    var tempChartData = data.response;
    var tempChartArray = tempChartData.split(",");
    for (var i = 0; i < tempChartArray.length; i++) {
        resultArray = [tempChartArray[i], parseFloat(tempChartArray[i + 1]), parseFloat(tempChartArray[i + 2]), parseFloat(tempChartArray[i + 3]), parseFloat(tempChartArray[i + 4]), parseInt(tempChartArray[i + 5])];
        chartData.push(resultArray);
        i += 5;
    }

    dataTable.addData(chartData);
    mapping = (chartSeries == "candlestick" || chartSeries == "ohlc") ? dataTable.mapAs({ open: 1, high: 2, low: 3, close: 4 }) : mapping = dataTable.mapAs({ value: 1 });

    switch (chartSeries) {
        case "area":
            var series = chart.plot(0).area(mapping);
            series.stroke('#a1a1a1');
            series.fill('#bfbfbf');
            break;
        case "line":
            var series = chart.plot(0).line(mapping);
            series.stroke('purple');
            break;
        case "column":
            var series = chart.plot(0).column(mapping);
            series.stroke('#a1a1a1');
            series.fill('#bfbfbf');
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
    let instrument = data.instrument;
    instrument = instrument.replace("_", "/");
    series.name(instrument);
    chart.title(instrument);
    chart.container('container');
    chart.draw();
}

function changeIndicator() {
    var toolSelected = document.getElementById('indicatorSelect').value;
    if (toolSelected == "reset")
        removeIndicator();
    else
        toggleIndicator(toolSelected);
}

function toggleIndicator(toolSelected) {
    var upperIndicator = document.getElementById('hidden_upper_indicator').value;
    var lowerIndicator = document.getElementById('hidden_lower_indicator').value;
    if (upperIndicator == toolSelected)
        removeUpperIndicator();
    else if (lowerIndicator == toolSelected)
        removeLowerIndicator();
    else
        appendLightbox(toolSelected);
}

function removeIndicator() {
    removeUpperIndicator();
    removeLowerIndicator();
    document.getElementById('indicatorSelect').value = "default";
}

function removeUpperIndicator() {
    document.getElementById('hidden_upper_indicator').value = "";
    document.getElementById('indicatorSelect').value = "default";
    while (chart.plot(0).getSeriesCount() > 1) {
        var count = 0;
        if (plot.getSeriesAt(count).name().includes("USD") == true || plot.getSeriesAt(count).name().includes("EUR") == true)
            count = 1;
        plot.removeSeriesAt(count);
    }
}

function removeLowerIndicator() {
    document.getElementById('hidden_lower_indicator').value = "";
    document.getElementById('indicatorSelect').value = "default";
    chart.plot(1).enabled(!chart.plot(1).enabled());
    chart.plot(1).dispose();
}


function appendIndicatorEvent(indicatorSelected) {
    var upperIndicator = document.getElementById('hidden_upper_indicator');
    var lowerIndicator = document.getElementById('hidden_lower_indicator');
    switch (indicatorSelected) {
        case "MACD":
            document.getElementById('macd_indicator_btn').addEventListener("click", function() {
                var fast = document.getElementById('macd_fast').value;
                var slow = document.getElementById('macd_slow').value;
                var signal = document.getElementById('macd_signal').value;
                var chartParameter = { "fast": parseInt(fast), "slow": parseInt(slow), "signal": parseInt(signal), "type": "line", "type2": "column" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("MACD", chartParameter);
                lowerIndicator.value = "MACD";
            });
            break
        case "RSI":
            document.getElementById('rsi_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('rsi_period').value;
                var chartParameter = { "period": parseInt(period), "type": "line" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("RSI", chartParameter);
                lowerIndicator.value = "RSI";
            });
            break;
        case "BBands":
            document.getElementById('bbands_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('bbands_period').value;
                var deviation = document.getElementById('bbands_deviation').value;
                var chartParameter = { "period": parseInt(period), "deviation": parseInt(deviation), "type": "line" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("BBands", chartParameter);
                upperIndicator.value = "BBands";
            });
            break;
        case "Stochastic":
            document.getElementById('stochastic_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById("stochastic-period").value;
                var kma = document.getElementById("stochastic-kma").value;
                var d = document.getElementById("stochastic-d").value;
                var ktype = document.getElementById("stochastic-kma-type").value;
                var dtype = document.getElementById("stochastic-dma-type").value;
                var chartParameter = { "period": parseInt(period), "kma": parseInt(kma), "d": parseInt(d), "ktype": ktype, "dtype": dtype, "type": "line" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type") && !key.includes("ktype") && !key.includes("dtype")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("Stochastic", chartParameter);
                lowerIndicator.value = "Stochastic";
            });
            break;
        case "Momentum":
            document.getElementById('momentum_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('momentum_period').value;
                var chartParameter = { "period": parseInt(period), "type": "line" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("Momentum", chartParameter);
                lowerIndicator.value = "Momentum";
            });
            break;
        case "ROC":
            document.getElementById('roc_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('roc_period').value;
                var chartParameter = { "period": parseInt(period), "type": "line" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("ROC", chartParameter);
                lowerIndicator.value = "ROC";
            });
            break;
        case "WilliamsR":
            document.getElementById('william_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('william_period').value;
                var chartParameter = { "period": parseInt(period), "type": "line" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("WilliamsR", chartParameter);
                lowerIndicator.value = "WilliamsR";
            });
            break;
        case "CCI":
            document.getElementById('cci_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('cci_period').value;
                var chartParameter = { "period": parseInt(period), "type": "line" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("CCI", chartParameter);
                lowerIndicator.value = "CCI";
            });
            break;
        case "PSAR":
            document.getElementById('psar_indicator_btn').addEventListener("click", function() {
                var start = document.getElementById('psar_start').value;
                var increment = document.getElementById('psar_increment').value;
                var max = document.getElementById('psar_max').value;
                var chartParameter = { "start": parseFloat(start), "increment": parseFloat(increment), "max": parseFloat(max), "type": "marker" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("PSAR", chartParameter);
                upperIndicator.value = "PSAR";
            });
            break;
        case "DMI":
            document.getElementById('dmi_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('dmi_period').value;
                var adx = document.getElementById('dmi_adx').value;
                var smooth = (document.getElementById('dmi_smooth').value == "true") ? true : false;
                var chartParameter = { "period": parseInt(period), "adx": parseInt(adx), "smooth": smooth, "type": "line" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type") && !key.includes("smooth")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("DMI", chartParameter);
                lowerIndicator.value = "DMI";
            });
            break;
        case "ATR":
            document.getElementById('atr_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('atr_period').value;
                var chartParameter = { "period": parseInt(period), "type": "line" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("ATR", chartParameter);
                lowerIndicator.value = "ATR";
            });
            break;
        case "EMA":
            document.getElementById('ema_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('ema_period').value;
                var chartParameter = { "period": parseInt(period), "type": "line" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("EMA", chartParameter);
                upperIndicator.value = "EMA";
            });
            break;
        case "SMA":
            document.getElementById('sma_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('sma_period').value;
                var chartParameter = { "period": parseInt(period), "type": "line" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("SMA", chartParameter);
                upperIndicator.value = "SMA";
            });
            break;
        case "ADL":
            document.getElementById('adl_indicator_btn').addEventListener("click", function() {
                var chartParameter = { "type": "line" };
                checkTools("ADL", chartParameter);
                lowerIndicator.value = "ADL";
            });
            break;
        case "OBV":
            document.getElementById('obv_indicator_btn').addEventListener("click", function() {
                var chartParameter = { "type": "line" };
                checkTools("OBV", chartParameter);
                lowerIndicator.value = "OBV";
            });
            break;
        case "MFI":
            document.getElementById('mfi_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('mfi_period').value;
                var chartParameter = { "period": parseInt(period), "type": "line" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("MFI", chartParameter);
                lowerIndicator.value = "MFI";
            });
            break;
        case "Aroon":
            document.getElementById('aroon_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('aroon_period').value;
                var chartParameter = { "period": parseInt(period), "type": "line" };
                for (var key in chartParameter) {
                    if ((isNaN(chartParameter[key]) || chartParameter[key] == 0) && !key.includes("type")) {
                        appendErrorAlert("Please enter valid input.");
                        return false;
                    }
                }
                checkTools("Aroon", chartParameter);
                lowerIndicator.value = "Aroon";
            });
            break;
    }
}