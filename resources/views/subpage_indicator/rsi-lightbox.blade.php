<div id ="RSI_indicator_box" class="lightbox">
    <div class="modal modal-content2">
        <div class="modal-header">
            <div class="modal-title">Relative Strength Index (RSI)</div>
            <span aria-hidden="true" class="close" aria-label="Close" onclick="toggleLightboxIndicator('RSI')">&times;</span>
        </div>

        <div class="modal-body-indicator">
            <div class="upper-body">
                <div class="button-series">
                    <label class="mx-left">Period</label>
                    <input type="text" id="rsi_period" class="form-control col-md-15" value="14" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;"/>
                </div>
            </div>
            <hr>
            <div class="lower-body">
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Description</b></label>
                    <label class="mx-left">The Relative Strength Index (RSI) oscillator is a momentum indicator that consists of one line that moves in a range between 0 and 100.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Parameters</b></label>
                    <label class="mx-left">The RSI parameters are adjustable. The default parameter is 14 periods for the time frame. Increasing the number of periods for the time frame decreases the volatility of the RSI, and decreasing the number of periods for the time frame decreases it.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Function</b></label>
                    <label class="mx-left">The RSI oscillator is used to determine is there bullish or bearish momentum behind a stock. The RSI line moving higher shows bullish momentum, and the RSI line moving lower shows bearish momentum. Also, the RSI line above 70 shows the market may be overbought, and the RSI line below 30 - the market may be oversold.</label>
                </div>
            </div>
            <hr>
            <div class="btn-body">
                <button class="btn form-control btn-primary col-md-2 btn-align-right" id="rsi_indicator_btn">Add</button>
                <button class="btn form-control btn-danger col-md-2 btn-align-right" onclick="toggleLightboxIndicator('RSI')">Cancel</button>
            </div>
        </div>
    </div>
</div>
