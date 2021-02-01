<div id ="Momentum_indicator_box" class="lightbox">
    <div class="modal modal-content2">
        <div class="modal-header">
            <div class="modal-title">Momentum</div>
            <span aria-hidden="true" class="close" aria-label="Close" onclick="toggleLightboxIndicator('Momentum')">&times;</span>
        </div>

        <div class="modal-body-indicator">
            <div class="upper-body">
                <div class="button-series">
                    <label class="mx-left">Period</label>
                    <input type="text" id="momentum_period" class="form-control col-md-15" value="14" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;"/>
                </div>
            </div>
            <hr>
            <div class="lower-body">
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Description</b></label>
                    <label class="mx-left">The Momentum indicator is a speed of movement indicator, that is designed to identify the speed (or strength) of a price movement. The momentum indicator compares the most recent closing price to a previous closing price and may be used as a trend-following oscillator (similar to the Moving Average Convergence Divergence (MACD)).</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Parameters</b></label>
                    <label class="mx-left">There is one parameter: the period.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Function</b></label>
                    <label class="mx-left">The Momentum indicator identifies when the price is moving upwards or downwards, and also by how much the price is moving upwards or downwards. When the momentum indicator is above zero, the price has upwards momentum, and when the momentum indicator is below zero the price has downwards momentum.</label>
                </div>
            </div>
            <hr>
            <div class="btn-body">
                <button class="btn form-control btn-primary col-md-2 btn-align-right" id="momentum_indicator_btn">Add</button>
                <button class="btn form-control btn-danger col-md-2 btn-align-right" onclick="toggleLightboxIndicator('Momentum')">Cancel</button>
            </div>
        </div>
    </div>
</div>
