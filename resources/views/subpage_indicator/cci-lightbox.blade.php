<div id ="CCI_indicator_box" class="lightbox">
    <div class="modal modal-content2">
        <div class="modal-header">
            <div class="modal-title">Commodity Channel Index (CCI)</div>
            <span aria-hidden="true" class="close" aria-label="Close" onclick="toggleLightboxIndicator('CCI')">&times;</span>
        </div>

        <div class="modal-body-indicator">
            <div class="upper-body">
                <div class="button-series">
                    <label class="mx-left">Period</label>
                    <input type="number"  id="cci_period" class="form-control col-md-15" value="20"/>
                </div>
            </div>
            <hr>
            <div class="lower-body">
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Description</b></label>
                    <label class="mx-left">Developed by Donald Lambert and featured in Commodities magazine in 1980, the Commodity Channel Index (CCI) is a versatile indicator that can be used to identify a new trend or warn of extreme conditions. Lambert originally developed CCI to identify cyclical turns in commodities, but the indicator can successfully applied to indices, ETFs, stocks and other securities. In general, CCI measures the current price level relative to an average price level over a given period of time. CCI is relatively high when prices are far above their average. CCI is relatively low when prices are far below their average. In this manner, CCI can be used to identify overbought and oversold levels.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Parameters</b></label>
                    <label class="mx-left">There are only one parameter - the period </label>
                </div>
            </div>
            <hr>
            <div class="btn-body">
                <button class="btn form-control btn-primary col-md-2 btn-align-right" id="cci_indicator_btn">Add</button>
                <button class="btn form-control btn-danger col-md-2 btn-align-right" onclick="toggleLightboxIndicator('CCI')">Cancel</button>
            </div>
        </div>
    </div>
</div>
