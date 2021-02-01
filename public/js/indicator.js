function appendFuncBtn(tool) {
    switch (tool) {
        case "AMA":
            document.getElementById('ama_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('ama_period').value;
                var fast = document.getElementById('ama_fast').value;
                var slow = document.getElementById('ama_slow').value;
                var obj = { "period": parseInt(period), "fast": parseInt(fast), "slow": parseInt(slow), "type": "line" };
                checkTools("AMA", obj);
            });
            break;
        case "MACD":
            document.getElementById('macd_indicator_btn').addEventListener("click", function() {
                var fast = document.getElementById('macd_fast').value;
                var slow = document.getElementById('macd_slow').value;
                var signal = document.getElementById('macd_signal').value;
                var obj = { "fast": parseInt(fast), "slow": parseInt(slow), "signal": parseInt(signal), "type": "line", "type2": "column" };
                checkTools("MACD", obj);
            });
            break
        case "RSI":
            document.getElementById('rsi_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('rsi_period').value;
                var obj = { "period": parseInt(period), "type": "line" };
                checkTools("RSI", obj);
            });
            break;
        case "BBands":
            document.getElementById('bbands_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('bbands_period').value;
                var deviation = document.getElementById('bbands_deviation').value;
                var obj = { "period": parseInt(period), "deviation": parseInt(deviation), "type": "line" };
                checkTools("BBands", obj);
            });
            break;
        case "Stochastic":
            document.getElementById('stochastic_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById("stochastic-period").value;
                var kma = document.getElementById("stochastic-kma").value;
                var d = document.getElementById("stochastic-d").value;
                var ktype = document.getElementById("stochastic-kma-type").value;
                var dtype = document.getElementById("stochastic-dma-type").value;
                var obj = { "period": parseInt(period), "kma": parseInt(kma), "d": parseInt(d), "ktype": ktype, "dtype": dtype, "type": "line" };
                checkTools("Stochastic", obj);
            });
            break;
        case "Momentum":
            document.getElementById('momentum_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('momentum_period').value;
                var obj = { "period": parseInt(period), "type": "line" };
                checkTools("Momentum", obj);
            });
            break;
        case "ROC":
            document.getElementById('roc_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('roc_period').value;
                var obj = { "period": parseInt(period), "type": "line" };
                checkTools("ROC", obj);
            });
            break;
        case "WilliamsR":
            document.getElementById('william_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('william_period').value;
                var obj = { "period": parseInt(period), "type": "line" };
                checkTools("WilliamsR", obj);
            });
            break;
        case "CCI":
            document.getElementById('cci_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('cci_period').value;
                var obj = { "period": parseInt(period), "type": "line" };
                checkTools("CCI", obj);
            });
            break;
        case "PSAR":
            document.getElementById('psar_indicator_btn').addEventListener("click", function() {
                var start = document.getElementById('psar_start').value;
                var increment = document.getElementById('psar_increment').value;
                var max = document.getElementById('psar_max').value;
                var obj = { "start": parseInt(start), "increment": parseInt(increment), "max": parseInt(max), "type": "marker" };
                checkTools("PSAR", obj);
            });
            break;
        case "DMI":
            document.getElementById('dmi_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('dmi_period').value;
                var adx = document.getElementById('dmi_adx').value;
                var smooth = document.getElementById('dmi_smooth').value;
                var obj = { "period": parseInt(period), "adx": parseInt(adx), "smooth": parseInt(smooth), "type": "line" };
                checkTools("DMI", obj);
            });
            break;
        case "ATR":
            document.getElementById('atr_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('atr_period').value;
                var obj = { "period": parseInt(period), "type": "line" };
                checkTools("ATR", obj);
            });
            break;
        case "ENV":
            document.getElementById('env_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('env_period').value;
                var deviation = document.getElementById('env_deviation').value;
                var ma = document.getElementById('env_ma').value;
                var obj = { "period": parseInt(period), "deviation": parseInt(deviation), "ma": parseInt(ma), "type": "line" };
                checkTools("ENV", obj);
            });
            break;
        case "EMA":
            document.getElementById('ema_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('ema_period').value;
                var obj = { "period": parseInt(period), "type": "line" };
                checkTools("EMA", obj);
            });
            break;
        case "MMA":
            document.getElementById('mma_indicator_btn').addEventListener("click", function() {
                var period = document.getElementById('mma_period').value;
                var obj = { "period": parseInt(period), "type": "line" };
                checkTools("MMA", obj);
            });
            break;
    }
}