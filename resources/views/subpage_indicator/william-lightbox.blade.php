<div id ="WilliamsR_indicator_box" class="lightbox">
    <div class="modal modal-content2">
        <div class="modal-header">
            <div class="modal-title">Williams %R</div>
            <span aria-hidden="true" class="close" aria-label="Close" onclick="toggleLightboxIndicator('WilliamsR')">&times;</span>
        </div>

        <div class="modal-body-indicator">
            <div class="upper-body">
                <div class="button-series">
                    <label class="mx-left">Period</label>
                    <input type="text" id="william_period" class="form-control col-md-15" value="10" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;"/>
                </div>
            </div>
            <hr>
            <div class="lower-body">
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Description</b></label>
                    <label class="mx-left">Williams %R, or just %R, is a momentum indicator showing the current closing price in relation to the high and low of the past N days (for a given N). It was developed by trader and author Larry Williams and is used in the stock and commodities markets.</label>
                </div>
                <br>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Parameters</b></label>
                    <label class="mx-left">There is only one parameter - the period.</label>
                </div>
            </div>
            <hr>
            <div class="btn-body">
                <button class="btn form-control btn-primary col-md-2 btn-align-right" id="william_indicator_btn">Add</button>
                <button class="btn form-control btn-danger col-md-2 btn-align-right" onclick="toggleLightboxIndicator('WilliamsR')">Cancel</button>
            </div>
        </div>
    </div>
</div>
