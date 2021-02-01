<div id ="BBands_indicator_box" class="lightbox">
    <div class="modal modal-content2">
        <div class="modal-header">
            <div class="modal-title">Adaptive Moving Average (BBands)</div>
            <span aria-hidden="true" class="close" aria-label="Close" onclick="toggleLightboxIndicator('BBands')">&times;</span>
        </div>

        <div class="modal-body-indicator">
            <div class="upper-body">
                <div class="button-series">
                    <label class="mx-left">Period</label>
                    <input type="text" id="bbands_period" class="form-control col-md-10" value="20" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;"/>
                </div>
                <div class="button-series">
                    <label class="mx-left">Deviation</label>
                    <input type="text" id="bbands_deviation" class="form-control col-md-10" value="2" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;" />
                </div>
            </div>
            <hr>
            <div class="lower-body">
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Description</b></label>
                    <label class="mx-left">Bollinger Bands are a volatility indicator that is displayed as two lines (bands): one drawn above a simple moving average of the price and one - below. These bands move closer to the moving average when price volatility is low and move farther away from the moving average when price volatility increases.</label>
                </div>
                <br>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Parameters</b></label>
                    <label class="mx-left">Bollinger Bands parameters can be adjusted. The default parameters are: 20 periods for the simple moving average and 2 for the standard deviations (the distance between each band and the SMA). Increasing the number of periods - decreases the volatility of the SMA, and decreasing their number - increases the volatility of the SMA. Increasing the number of standard deviations moves the bands farther away from the SMA, and decreasing - moves the bands closer to the SMA. Bollinger Bands parameters are the period and the deviation.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Function</b></label>
                    <label class="mx-left">Bollinger Bands are used to determine how volatile a stock is. Stocks move between levels of high and low volatility, and when the Bollinger bands grip a stock, it is a sign that the stock is consolidating and that a breakout is inevitable. When the Bollinger bands widen, it is a sign that the stock has burst out into a new trend.</label>
                </div>
            </div>
            <hr>
            <div class="btn-body">
                <button class="btn form-control btn-primary col-md-2 btn-align-right" id="bbands_indicator_btn">Add</button>
                <button class="btn form-control btn-danger col-md-2 btn-align-right" onclick="toggleLightboxIndicator('BBands')">Cancel</button>
            </div>
        </div>
    </div>
</div>
