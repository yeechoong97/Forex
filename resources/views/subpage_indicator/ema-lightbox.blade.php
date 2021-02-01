<div id ="EMA_indicator_box" class="lightbox">
    <div class="modal modal-content2">
        <div class="modal-header">
            <div class="modal-title">Exponential moving average (EMA)</div>
            <span aria-hidden="true" class="close" aria-label="Close" onclick="toggleLightboxIndicator('EMA')">&times;</span>
        </div>

        <div class="modal-body-indicator">
            <div class="upper-body">
                <div class="button-series">
                    <label class="mx-left">Period</label>
                    <input type="number"  id="ema_period" class="form-control col-md-15" value="20"/>
                </div>
            </div>
            <hr>
            <div class="lower-body">
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Description</b></label>
                    <label class="mx-left">An Exponential Moving Average is a trending indicator - a single line that shows the weighted mean of the stock price during a specified period of time. This type of moving average that is similar to a Simple Moving Average, except that more weight is given to the latest data.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Parameters</b></label>
                    <label class="mx-left">EMA period parameter can be adjusted. The default parameter is 20 periods. Increasing the number of periods will decrease the volatility, and decreasing the number of periods will increase the volatility.EMA indicator has only one parameter: the period.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Function</b></label>
                    <label class="mx-left">Exponential Moving Averages are used by traders to detect the trend of the stock and to identify possible levels of support and resistance. If the Exponential Moving Average is trending higher and the price is above it, the stock is considered to be in an uptrend, in other case - if it is trending lower and the price is below it, the stock is considered to be in a downtrend. Also, when the price is above an uptrending EMA line, the Exponential Moving Average can act as a possible support level. In the same way, when the price below a downtrending EMA line - the Exponential Moving Average can act as a possible resistance level.</label>
                </div>
            </div>
            <hr>
            <div class="btn-body">
                <button class="btn form-control btn-primary col-md-2 btn-align-right" id="ema_indicator_btn">Add</button>
                <button class="btn form-control btn-danger col-md-2 btn-align-right" onclick="toggleLightboxIndicator('EMA')">Cancel</button>
            </div>
        </div>
    </div>
</div>
