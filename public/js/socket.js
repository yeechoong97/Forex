const socket = io('mighty-headland-26950.herokuapp.com', {
    transports: ['websocket'],
    upgrade: false
});

socket.on('news', function(data) {
    var strLines = data.split("\n");
    for (var i in strLines) {
        if (strLines[i] != "") {
            var json = JSON.parse(strLines[i]);
            if (json.type == "PRICE") {
                var JSONInstrument = json.instrument;
                var componentID = ["_Sell", "_Buy", "_Pips", "_header"];
                for (i = 0; i < componentID.length; i++) {
                    componentID[i] = JSONInstrument + componentID[i];
                }

                var sell = document.getElementById(componentID[0]);
                var buy = document.getElementById(componentID[1]);
                var pips = document.getElementById(componentID[2]);
                var header = document.getElementById(componentID[3]);
                var previous_sell_price = sell.innerHTML;
                var previous_buy_price = buy.innerHTML;

                if (previous_sell_price < json.bids[0].price && previous_buy_price < json.asks[0].price) {
                    highlight(header, buy, sell, '#11c900');
                } else if (previous_sell_price > json.bids[0].price && previous_buy_price > json.asks[0].price) {
                    highlight(header, buy, sell, '#fc3030');
                }

                sell.innerHTML = json.bids[0].price;
                buy.innerHTML = json.asks[0].price;

                var instrument = document.getElementById("instrumentSelect").value;
                var multiply = 10000;
                if (JSONInstrument.includes("JPY") == true) { multiply = 100; }
                pips.innerHTML = ((json.asks[0].price - json.bids[0].price) * multiply).toFixed(1);

                if (JSONInstrument == instrument) {
                    document.getElementById("sell-action").innerHTML = json.bids[0].price;
                    document.getElementById("buy-action").innerHTML = json.asks[0].price;
                    document.getElementById("pips-action").innerHTML = ((json.asks[0].price - json.bids[0].price) * multiply).toFixed(1);
                    document.getElementById("order-sell-data").innerHTML = json.bids[0].price;
                    document.getElementById("order-buy-data").innerHTML = json.asks[0].price;
                    document.getElementById("order-spread-data").innerHTML = ((json.asks[0].price - json.bids[0].price) * multiply).toFixed(1);
                }
                updateTable(JSONInstrument, parseFloat(json.bids[0].price), parseFloat(json.asks[0].price));
            }
        }
    }
});