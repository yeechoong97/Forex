<div id ="Stochastic_indicator_box" class="lightbox">
    <div class="modal modal-content2 add-body-height ">
        <div class="modal-header">
            <div class="modal-title">Stochastic Oscillator</div>
            <span aria-hidden="true" class="close" aria-label="Close" onclick="toggleLightboxIndicator('Stochastic')">&times;</span>
        </div>

        <div class="modal-body-indicator">
            <div class="upper-body add-height">
                <div class="button-series">
                    <label class="mx-left">K-Period</label>
                    <input type="text" id="stochastic-period" class="form-control col-md-10" value="14" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;"/>
                </div>
                <div class="button-series">
                    <label class="mx-left">Kma Period</label>
                    <input type="text" id="stochastic-kma" class="form-control col-md-10" value="3" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;" />
                </div>
                <div class="button-series">
                    <label class="mx-left">D-Period</label>
                    <input type="text" id="stochastic-d" class="form-control col-md-10" value="3" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;" />
                </div>
                <div class="button-series">
                    <label class="mx-left">Kma Type</label>
                    <select class="form-control col-md-10" id="stochastic-kma-type">
                        <option value="sma" selected>SMA</option>
                        <option value="ema">EMA</option>
                    </select>
                </div>
                <div class="button-series">
                    <label class="mx-left">Dma Type</label>
                    <select class="form-control col-md-10" id="stochastic-dma-type">
                        <option value="sma" selected>SMA</option>
                        <option value="ema">EMA</option>
                    </select>             
                </div>
            </div>
            <hr>
            <div class="lower-body">
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Description</b></label>
                    <label class="mx-left">The Slow Stochastic Oscillator is a momentum indicator that consists of two lines - %K and %D, these lines move in the range between 0 and 100. The slow stochastic shows the interrelation of the current closing price to the trading range in the past. If the current closing price is toward the top of the past trading range, %K moves higher. If the current closing price is toward the bottom of the past trading range, %K moves lower.</label>
                </div>
                <br>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Parameters</b></label>
                    <label class="mx-left">Slow stochastic parameters can be adjusted. The default parameters are 20 periods for the time frame and 5 periods for the %D smoothing. Increasing the number of periods for the time frame decreases the volatility of the slow stochastic, and decreasing the number of periods for the time frame will increase the volatility of the slow stochastic. Also, increasing the number of periods for the %D smoothing decreases the volatility of the %D line, and decreasing the number of periods for the time frame increases the volatility of the %D line.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Function</b></label>
                    <label class="mx-left">The Slow Stochastic Oscillator is used to determine whether there is bullish or bearish momentum behind a stock. %K above %D in the slow stochastic shows bullish momentum, and %K below %D - shows bearish momentum. Also, when %K is above 80, it shows the market may be overbought, and when %K is below 20 - shows the market may be oversold.</label>
                </div>
            </div>
            <hr>
            <div class="btn-body">
                <button class="btn form-control btn-primary col-md-2 btn-align-right" id="stochastic_indicator_btn">Add</button>
                <button class="btn form-control btn-danger col-md-2 btn-align-right" onclick="toggleLightboxIndicator('Stochastic')">Cancel</button>
            </div>
        </div>
    </div>
</div>
