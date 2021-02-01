<div id ="ENV_indicator_box" class="lightbox">
    <div class="modal modal-content2">
        <div class="modal-header">
            <div class="modal-title">Moving Average Envelopes (ENV)</div>
            <span aria-hidden="true" class="close" aria-label="Close" onclick="toggleLightboxIndicator('ENV')">&times;</span>
        </div>

        <div class="modal-body-indicator">
            <div class="upper-body">
                <div class="button-series">
                    <label class="mx-left">Period</label>
                    <input type="number" id="env_period" class="form-control col-md-10" value="20" />
                </div>
                <div class="button-series">
                    <label class="mx-left">Deviation</label>
                    <input type="number" id="env_deviation" class="form-control col-md-10" value="10" />
                </div>
                <div class="button-series">
                    <label class="mx-left">Ma Type</label>
                    <select id="env_ma" class="form-control col-md-10">
                        <option value="ema" selected>EMA</option>
                        <option value="sma">SMA</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="lower-body">
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Description</b></label>
                    <label class="mx-left">Developed by Marc Chaikin, the ENV measures the momentum of the Accumulation Distribution Line using the MACD formula. This makes it an indicator of an indicator. The ENV is the difference between the 3-day EMA of the Accumulation Distribution Line and the 10-day EMA of the Accumulation Distribution Line. Like other momentum indicators, this indicator is designed to anticipate directional changes in the Accumulation Distribution Line by measuring the momentum behind the movements. A momentum change is the first step to a trend change. Anticipating trend changes in the Accumulation Distribution Line can help chartists anticipate trend changes in the underlying security. The Chaikin Oscillator generates signals with crosses above/below the zero line or with bullish/bearish divergences.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Parameters</b></label>
                    <label class="mx-left">ENV indicator needs three parameters: two periods: period and a period for ADX, a smoothing mode for whilders</label>
                </div>
            </div>
            <hr>
            <div class="btn-body">
                <button class="btn form-control btn-primary col-md-2 btn-align-right" id="env_indicator_btn">Add</button>
                <button class="btn form-control btn-danger col-md-2 btn-align-right" onclick="toggleLightboxIndicator('ENV')">Cancel</button>
            </div>
        </div>
    </div>
</div>
