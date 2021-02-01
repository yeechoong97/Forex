<div id ="MACD_indicator_box" class="lightbox">
    <div class="modal modal-content2">
        <div class="modal-header">
            <div class="modal-title">Moving Average Convergence/Divergence (MACD)</div>
            <span aria-hidden="true" class="close" aria-label="Close" onclick="toggleLightboxIndicator('MACD')">&times;</span>
        </div>

        <div class="modal-body-indicator">
            <div class="upper-body">
                <div class="button-series">
                    <label class="mx-left">Fast Period</label>
                    <input type="text" id="macd_fast" class="form-control col-md-10" value="12" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;"/>
                </div>
                <div class="button-series">
                    <label class="mx-left">Slow Period</label>
                    <input type="text" id="macd_slow" class="form-control col-md-10" value="26" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;" />
                </div>
                <div class="button-series">
                    <label class="mx-left">Signal Period</label>
                    <input type="text" id="macd_signal" class="form-control col-md-10" value="9" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;" />
                </div>
            </div>
            <hr>
            <div class="lower-body">
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Description</b></label>
                    <label class="mx-left">The Moving Average Convergence/Divergence (MACD) is a momentum indicator that consists of two lines - an indicator line and a signal line. The indicator line displays the difference between two exponential moving averages with different smoothing factors, and the signal line displays an exponential moving average of the difference between mentioned two exponential moving averages.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Parameters</b></label>
                    <label class="mx-left">MACD parameters can be adjusted. The default parameters are 26 for the slow exponential moving average, 12 for the fast exponential moving average and 20 for the signal line. Decreasing any of the parameters decreases the volatility of the related line, and increasing them - increases the volatility of the related line.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Function</b></label>
                    <label class="mx-left">The MACD is used to determine is there bullish or bearish momentum behind a stock. When the indicator line is above the signal line, the MACD shows bullish momentum, and the indicator line below the signal line in the MACD shows bearish momentum.</label>
                </div>
            </div>
            <hr>
            <div class="btn-body">
                <button class="btn form-control btn-primary col-md-2 btn-align-right" id="macd_indicator_btn">Add</button>
                <button class="btn form-control btn-danger col-md-2 btn-align-right" onclick="toggleLightboxIndicator('MACD')">Cancel</button>
            </div>
        </div>
    </div>
</div>
