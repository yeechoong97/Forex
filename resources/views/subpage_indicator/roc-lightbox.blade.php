<div id ="ROC_indicator_box" class="lightbox">
    <div class="modal modal-content2">
        <div class="modal-header">
            <div class="modal-title">Rate of Change (ROC)</div>
            <span aria-hidden="true" class="close" aria-label="Close" onclick="toggleLightboxIndicator('ROC')">&times;</span>
        </div>

        <div class="modal-body-indicator">
            <div class="upper-body">
                <div class="button-series">
                    <label class="mx-left">Period</label>
                    <input type="text" id="roc_period" class="form-control col-md-15" value="20" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;"/>
                </div>
            </div>
            <hr>
            <div class="lower-body">
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Description</b></label>
                    <label class="mx-left">The Rate of Change oscillator is a momentum indicator that consists of one line. The ROC measures the percentage change in the price from one trading period to the next. If the percentage change is big, the ROC line moves harshly up or down, depending on price changing direction. In other case - if the percentage change is small, the ROC line moves slowly up or down, depending on the price changing direction.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Parameters</b></label>
                    <label class="mx-left">The ROC indicator parameters can be adjusted. The default parameter is 12 periods for the time frame. Increasing the number of periods for the time frame decreases the volatility of the ROC indicator, and decreasing the number of periods for the time frame increases the volatility of the ROC indicator.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Function</b></label>
                    <label class="mx-left">The ROC oscillator is used to determine is there bullish or bearish momentum behind a stock. The ROC line above the zero line shows bullish momentum, and the ROC line below the zero line shows bearish momentum.</label>
                </div>
            </div>
            <hr>
            <div class="btn-body">
                <button class="btn form-control btn-primary col-md-2 btn-align-right" id="roc_indicator_btn">Add</button>
                <button class="btn form-control btn-danger col-md-2 btn-align-right" onclick="toggleLightboxIndicator('ROC')">Cancel</button>
            </div>
        </div>
    </div>
</div>
