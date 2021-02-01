//Update the font colour in the live streaming box
function highlight(header, buy, sell, color) {
    header.style.color = color;
    buy.style.color = color;
    sell.style.color = color;
    setTimeout(function() {
        header.style.color = 'black';
        buy.style.color = 'black';
        sell.style.color = 'black';
    }, 1000);
}

//Update the order table
function updateTable(instrument, sell, buy) {
    var table = document.getElementById("all_orders");
    var instrument = instrument.replace("_", "/");

    //Update the order record in the table
    for (i = 1; i < table.rows.length; i++) {
        let row = table.rows[i]
        var id = row.cells[0].innerHTML;
        var pairs = row.cells[2].innerHTML;
        var units = row.cells[3].innerHTML;
        var type = row.cells[4].innerHTML;
        var entry = row.cells[6].innerHTML;
        var decimal = 1;
        var multiply = 10000;
        var profit_usd, pre_profit, margin = 0;

        //Check the input with switch case for dedicated formula
        switch (pairs) {
            case "USD/JPY":
                var temp_sell = document.getElementById("USD_JPY_Sell").innerHTML;
                var temp_buy = document.getElementById("USD_JPY_Buy").innerHTML;
                var midpoint = (parseFloat(temp_sell) + parseFloat(temp_buy)) / 2;
                pre_profit = 0.01 * units / midpoint;
                multiply = 100;
                decimal = 0.01;
                break;

            case "EUR/JPY":
                var temp_sell = document.getElementById("USD_JPY_Sell").innerHTML;
                var temp_buy = document.getElementById("USD_JPY_Buy").innerHTML;
                var midpoint = (parseFloat(temp_sell) + parseFloat(temp_buy)) / 2;
                pre_profit = 0.01 * units / midpoint;
                multiply = 100;
                decimal = 0.01;
                break;

            default:
                pre_profit = 0.0001 * units;
                break;
        }

        //Check the instrument and type
        if (instrument == pairs && type == "Long") {
            var pips = (sell - entry) * multiply;
            profit_usd = pre_profit * pips;
            var profit_percent = profit_usd / (((buy + sell) / 2) * (units * decimal)) * 100;
            row.cells[7].innerHTML = sell;
            row.cells[8].innerHTML = profit_usd.toFixed(2);
            row.cells[9].innerHTML = pips.toFixed(1);
            row.cells[10].innerHTML = profit_percent.toFixed(2);
        } else if (instrument == pairs && type == "Short") {
            var pips = (entry - buy) * multiply;
            profit_usd = pre_profit * pips;
            var profit_percent = profit_usd / (((buy + sell) / 2) * (units * decimal)) * 100;
            row.cells[7].innerHTML = buy;
            row.cells[8].innerHTML = profit_usd.toFixed(2);
            row.cells[9].innerHTML = pips.toFixed(1);
            row.cells[10].innerHTML = profit_percent.toFixed(2);
        }

        //Update the colour of font according to profit or loss
        if (instrument == pairs && profit_usd > 0) {
            row.cells[8].style.color = "#1cbd00";
            row.cells[9].style.color = "#1cbd00";
            row.cells[10].style.color = "#1cbd00";
        } else if (instrument == pairs && profit_usd < 0) {
            row.cells[8].style.color = "red";
            row.cells[9].style.color = "red";
            row.cells[10].style.color = "red";
        }

        var exit_id = document.getElementById('position-ticket-id').innerHTML;
        var percent = document.getElementById('hidden_percent').value;
        if (exit_id == id && instrument == pairs) {
            document.getElementById('units-profit').innerHTML = (profit_usd * (percent / 100)).toFixed(2);
        }
    }
}

//Open the Lightbox
function openLightbox(type) {
    $('#Lightbox').fadeIn(300);
    if (type == "sell") {
        document.getElementById("order-sell").style.backgroundColor = "#ffb9b9";
        document.getElementById("order-buy").style.backgroundColor = "white";
    } else {
        document.getElementById("order-buy").style.backgroundColor = "#9ecdfc";
        document.getElementById("order-sell").style.backgroundColor = "white";
    }
    document.getElementById("order-type").innerHTML = type;
    updateLive();
}

//Update the data in the lightbox
function updateLive() {
    var sell = document.getElementById('sell-action').innerHTML;
    var buy = document.getElementById('buy-action').innerHTML;
    var pips = document.getElementById('pips-action').innerHTML;
    document.getElementById('order-sell-data').innerHTML = sell;
    document.getElementById('order-buy-data').innerHTML = buy;
    document.getElementById('order-spread-data').innerHTML = pips;
}

//Open the Close Position Order Lightbox
function openOrderBox(ticketID, percentage) {
    if (ticketID == "T") {
        ticketID = document.getElementById('position-ticket-id').innerHTML;
        document.getElementById('hidden_percent').value = percentage;
    }

    var instrument, units, type, entry, profit;
    var table = document.getElementById("all_orders");
    for (i = 1; i < table.rows.length; i++) {
        let row = table.rows[i]
        var id = row.cells[0].innerHTML;
        if (id == ticketID) {
            instrument = row.cells[2].innerHTML;
            units = row.cells[3].innerHTML;
            type = row.cells[4].innerHTML;
            entry = row.cells[6].innerHTML;
            profit = row.cells[8].innerHTML;
        }
    }
    $('#Position_box').fadeIn(300);
    document.getElementById('position-ticket-id').innerHTML = ticketID;
    document.getElementById('position-title').innerHTML = instrument;
    document.getElementById('units_orders_quantity').innerHTML = units;
    document.getElementById('position-total-units').value = units;
    document.getElementById('units-profit').innerHTML = profit;

    var array = {
        first: { value: 25, name: "first-left-units" },
        second: { value: 50, name: "second-left-units" },
        third: { value: 75, name: "third-left-units" },
        fourth: { value: 100, name: "fourth-left-units" }
    };

    for (var key in array) {
        if (percentage == array[key].value) {
            document.getElementById(array[key].name).style.backgroundColor = "#9ecdfc";
            document.getElementById('position-total-units').value = units * (percentage / 100);
            document.getElementById('units_remaining').innerHTML = units - (units * (percentage / 100));
            document.getElementById('units-profit').innerHTML = (profit * (percentage / 100)).toFixed(2);
        } else {
            document.getElementById(array[key].name).style.backgroundColor = "white";
        }
    }
}

//Validate the input in the Lightbox Units
function validateUnits() {
    var units = document.getElementById('order-units').value;
    var type = document.getElementById("order-type").innerHTML;
    var instrument = document.getElementById('lightbox-title').innerHTML;
    var init_leverage = document.getElementById('account-leverage').innerHTML;
    var leverage = init_leverage.split(":");
    leverage[0] = parseInt(leverage[0]);
    var account_margin = document.getElementById('account-margin').innerHTML;
    account_margin = parseFloat(account_margin.substring(1));
    var entry = document.getElementById("order-" + type + "-data").innerHTML;
    var exit;

    if (type == "sell") {
        exit = document.getElementById("order-buy-data").innerHTML;
    } else {
        exit = document.getElementById("order-sell-data").innerHTML;
    }
    var margin = calculateMargin(instrument, units, leverage[0], entry, exit);

    if (margin >= account_margin || units > 1000000 || units == 0) {
        document.getElementById('tick').style.display = 'none';
        document.getElementById('cross').style.display = 'inline';
    } else {
        document.getElementById('tick').style.display = 'inline';
        document.getElementById('cross').style.display = 'none';
    }
    document.getElementById('margin-value').innerHTML = margin;
    document.getElementById('order-error-msg').innerHTML = "";
    document.getElementById('close-error-msg').innerHTML = "";
}

//Update the profit and margin while inputting in Lightbox
function updateRemaining() {
    var table = document.getElementById("all_orders");
    var ticketID = document.getElementById('position-ticket-id').innerHTML;
    var profit;
    for (i = 1; i < table.rows.length; i++) {
        let row = table.rows[i]
        for (let j in row.cells) {
            var id = row.cells[0].innerHTML;
            if (id == ticketID)
                profit = row.cells[8].innerHTML;
        }
    }
    var deduct = document.getElementById('position-total-units').value;
    var units = document.getElementById('units_orders_quantity').innerHTML;
    document.getElementById('units_remaining').innerHTML = units - deduct;
    var percentage = 100 - ((units - deduct) / units * 100);
    document.getElementById('hidden_percent').value = percentage;
    document.getElementById('units-profit').innerHTML = (profit * (percentage / 100)).toFixed(2);

    var array = {
        first: { value: 25, name: "first-left-units" },
        second: { value: 50, name: "second-left-units" },
        third: { value: 75, name: "third-left-units" },
        fourth: { value: 100, name: "fourth-left-units" }
    };

    for (var key in array) {
        if (percentage == array[key].value)
            document.getElementById(array[key].name).style.backgroundColor = "#9ecdfc";
        else
            document.getElementById(array[key].name).style.backgroundColor = "white";
    }

    if (deduct > parseInt(units) || deduct == 0 || deduct == "") {
        document.getElementById('tick-close').style.display = 'none';
        document.getElementById('cross-close').style.display = 'inline';
    } else {
        document.getElementById('tick-close').style.display = 'inline';
        document.getElementById('cross-close').style.display = 'none';
    }
}

//Close the lightbox
function closeLightbox(container) {
    $('#' + container).fadeOut(300);
    document.getElementById('tick').style.display = 'none';
    document.getElementById('cross').style.display = 'none';
    document.getElementById('tick-close').style.display = 'none';
    document.getElementById('cross-close').style.display = 'none';
    document.getElementById('order-units').value = "";
    document.getElementById('margin-value').innerHTML = 0;
    document.getElementById('order-error-msg').innerHTML = "";
    document.getElementById('close-error-msg').innerHTML = "";
}

//Calculate the margin for instrument
function calculateMargin(instrument, units, leverage, entry, exit) {
    var midpoint = (parseFloat(entry) + parseFloat(exit)) / 2;
    switch (instrument) {
        case "USD/JPY":
            margin = (units / leverage * 1).toFixed(4);
            break;

        case "EUR/JPY":
            var temp_sell = document.getElementById("EUR_USD_Sell").innerHTML;
            var temp_buy = document.getElementById("EUR_USD_Buy").innerHTML;
            midpoint = (parseFloat(temp_sell) + parseFloat(temp_buy)) / 2;
            margin = (units / leverage * midpoint).toFixed(4);
            break;

        default:
            margin = (units / leverage * midpoint).toFixed(4);
            break;
    }
    return margin;
}

function changeInstrument(instrument) {
    document.getElementById('instrumentSelect').value = instrument;
    removeIndicator();
    changeSeries();
    setRemarks(instrument);
    appendData(instrument);
}

//Change the remarks of the selected instrument
function setRemarks(instrument) {

    var instrument_lists = {
        EURUSD: { pair: "EUR_USD", preview: "EUR/USD" },
        AUDUSD: { pair: "AUD_USD", preview: "AUD/USD" },
        GBPUSD: { pair: "GBP_USD", preview: "GBP/USD" },
        USDJPY: { pair: "USD_JPY", preview: "USD/JPY" },
        EURJPY: { pair: "EUR_JPY", preview: "EUR/JPY" },
    }

    for (var key in instrument_lists) {
        if (instrument != instrument_lists[key].pair) {
            document.getElementById(instrument_lists[key].pair + "_span").style.display = "none";
            document.getElementById(instrument_lists[key].pair + "_header").style.backgroundColor = "whitesmoke";
            document.getElementById(instrument_lists[key].pair + "_Buy").style.backgroundColor = "white";
            document.getElementById(instrument_lists[key].pair + "_Sell").style.backgroundColor = "white";
            document.getElementById(instrument_lists[key].pair + "_Pips").style.backgroundColor = "whitesmoke";
        } else {
            // The instrument matched the array item
            document.getElementById(instrument_lists[key].pair + "_span").style.display = "inline";
            document.getElementById(instrument_lists[key].pair + "_header").style.backgroundColor = "#fff7eb";
            document.getElementById(instrument_lists[key].pair + "_Buy").style.backgroundColor = "#e0f0ff";
            document.getElementById(instrument_lists[key].pair + "_Sell").style.backgroundColor = "#ffeded";
            document.getElementById(instrument_lists[key].pair + "_Pips").style.backgroundColor = "#f5edff";
            document.getElementById("lightbox-title").innerHTML = instrument_lists[key].preview;
        }
    }
}

function appendData(instrument) {
    var sell = document.getElementById(instrument + "_Sell").innerHTML;
    var buy = document.getElementById(instrument + "_Buy").innerHTML;
    var pips = document.getElementById(instrument + "_Pips").innerHTML;

    document.getElementById("sell-action").innerHTML = sell;
    document.getElementById("buy-action").innerHTML = buy;
    document.getElementById("pips-action").innerHTML = pips;
}

//Refresh the table after perform an order / close a position
function reload() {
    var url = '/index';
    $("#table_all_orders").load(url + " #table_all_orders", "");
    $("#account_table").load(url + " #account_table", "");
    document.getElementById("order-units").value = 0;
}

//Save the order into database
function saveOrder() {
    var status = document.getElementById('cross').style.display;
    var units = document.getElementById("order-units").value;
    if (status == "inline" || units <= 0 || units == "") {
        document.getElementById('order-error-msg').innerHTML = "*Please enter valid units in the field provided";
    } else {
        var units = document.getElementById("order-units").value;
        var token = $('meta[name="csrf-token"]').attr('content');
        var type = document.getElementById("order-type").innerHTML;
        var entry = document.getElementById("order-" + type + "-data").innerHTML;
        var instrument = document.getElementById("lightbox-title").innerHTML;
        var USDJPY_sell = document.getElementById("USD_JPY_Sell").innerHTML;
        var USDJPY_buy = document.getElementById("USD_JPY_Buy").innerHTML;
        var EURJPY_sell = document.getElementById("EUR_USD_Sell").innerHTML;
        var EURJPY_buy = document.getElementById("EUR_USD_Buy").innerHTML;
        var init_leverage = document.getElementById("account-leverage").innerHTML;
        var leverage = init_leverage.split(":");
        leverage[0] = parseInt(leverage[0]);
        var exit;

        if (type == "sell") {
            exit = document.getElementById("order-buy-data").innerHTML;
            type = "Short";
        } else {
            exit = document.getElementById("order-sell-data").innerHTML;
            type = "Long";
        }
        var margin = calculateMargin(instrument, units, leverage[0], entry, exit);

        $.ajax({
            type: 'POST',
            url: '/index/store',
            data: {
                _token: token,
                instrument: instrument,
                unit: units,
                type: type,
                entry: entry,
                exit: exit,
                margin: margin,
                USDJPY_sell: USDJPY_sell,
                USDJPY_buy: USDJPY_buy,
                EURJPY_sell: EURJPY_sell,
                EURJPY_buy: EURJPY_buy,
            },
            success: function(data) {
                clearInterval(streaming);
                closeLightbox("Lightbox");
                alert(data.message);
                reload();
                streaming = setInterval(stream, 1000);
            },
            error: function(data) {
                console.log(JSON.stringify(data));
            }
        });
    }
}

//Update the order in the database
function closePosition() {
    var status = document.getElementById('cross-close').style.display;
    var deduct = document.getElementById('position-total-units').value;
    if (status == "inline" || deduct == "" || deduct <= 0) {
        document.getElementById('close-error-msg').innerHTML = "*Please enter valid units in the field provided";
    } else {
        var token = $('meta[name="csrf-token"]').attr('content');
        var exit, cost, profit;
        var ticketID = document.getElementById('position-ticket-id').innerHTML;
        var remaining_units = document.getElementById('units_remaining').innerHTML;
        var instrument = document.getElementById("position-title").innerHTML;
        var init_leverage = document.getElementById("account-leverage").innerHTML;
        var leverage = init_leverage.split(":");
        leverage[0] = parseInt(leverage[0]);

        var table = document.getElementById("all_orders");
        for (i = 1; i < table.rows.length; i++) {
            let row = table.rows[i]
            var id = row.cells[0].innerHTML;
            if (id == ticketID) {
                entry = row.cells[6].innerHTML;
                exit = row.cells[7].innerHTML;
                cost = row.cells[8].innerHTML;
                profit = row.cells[9].innerHTML;
            }
        }
        var margin = calculateMargin(instrument, remaining_units, leverage[0], entry, exit);

        $.ajax({
            type: 'PUT',
            url: '/index/close',
            data: {
                _token: token,
                ticketID: ticketID,
                margin: margin,
                entry: entry,
                exit: exit,
                cost: cost,
                profit: profit,
                remaining_units: remaining_units,
            },
            success: function(data) {
                clearInterval(streaming);
                closeLightbox('Position_box');
                alert(data.message);
                reload();
                streaming = setInterval(stream, 1000);
            },
            error: function(data) {
                console.log(JSON.stringify(data));
            }
        });
    }
}

function appendTempData(arrayInstrument) {
    for (var i in arrayInstrument) {
        var componentID = ["_Sell", "_Buy", "_Pips", "_header"];
        for (var j in componentID) {
            componentID[j] = arrayInstrument[i][0] + componentID[j];
        }
        var sell = document.getElementById(componentID[0]);
        var buy = document.getElementById(componentID[1]);
        var pips = document.getElementById(componentID[2]);
        var header = document.getElementById(componentID[3]);
        sell.innerHTML = arrayInstrument[i][1];
        buy.innerHTML = arrayInstrument[i][2];

        var instrument = "EUR_USD";
        var multiply = 10000;
        if (arrayInstrument[i][0].includes("JPY") == true) { multiply = 100; }
        pips.innerHTML = ((arrayInstrument[i][2] - arrayInstrument[i][1]) * multiply).toFixed(1);

        if (arrayInstrument[i][0] == instrument) {
            document.getElementById("sell-action").innerHTML = arrayInstrument[i][1];
            document.getElementById("buy-action").innerHTML = arrayInstrument[i][2];
            document.getElementById("pips-action").innerHTML = ((arrayInstrument[i][2] - arrayInstrument[i][1]) * multiply).toFixed(1);
            document.getElementById("order-sell-data").innerHTML = arrayInstrument[i][1];
            document.getElementById("order-buy-data").innerHTML = arrayInstrument[i][2];
            document.getElementById("order-spread-data").innerHTML = ((arrayInstrument[i][2] - arrayInstrument[i][1]) * multiply).toFixed(1);
        }
        updateTable(arrayInstrument[i][0], parseFloat(arrayInstrument[i][1]), parseFloat(arrayInstrument[i][2]));
    }
}

function toggleMainHelpLightbox(div) {
    var check = document.getElementById('main-help-lightbox').style.display;
    var array_lightbox = ["account-lightbox", "rates-lightbox", "rates-lightbox1", "order-lightbox", "order-lightbox1", "order-lightbox2", "buy-lightbox", "close-lightbox"];
    var array_lightbox_indicator = ["account-lightbox-indicator", "rates-lightbox-indicator", "rates-lightbox-indicator1", "order-lightbox-indicator", "order-lightbox-indicator1", "order-lightbox-indicator2", "buy-lightbox-indicator", "close-lightbox-indicator"]
    if (check == "" || check == "none") {
        var selected = div + "-lightbox";
        document.getElementById(selected).classList.add('active');
        document.getElementById(selected + "-indicator").classList.add('active');
        $('#main-help-lightbox').fadeIn(300);
    } else {
        for (var i in array_lightbox) {
            document.getElementById(array_lightbox[i]).classList.remove('active');
            document.getElementById(array_lightbox_indicator[i]).classList.remove('active');
        }
        $('#main-help-lightbox').fadeOut(300);
    }
}

function toggleLightboxIndicator(tool) {
    var id = tool + '_indicator_box';
    var check = document.getElementById(id).style.display;
    if (check == "" || check == "none") {
        $('#' + id).fadeIn(300);
    } else {
        $('#' + id).fadeOut(300);
        document.getElementById('indicatorSelect').value = "default";
    }
}