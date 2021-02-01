<div id ="MMA_indicator_box" class="lightbox">
    <div class="modal modal-content2">
        <div class="modal-header">
            <div class="modal-title">Exponential moving average (MMA)</div>
            <span aria-hidden="true" class="close" aria-label="Close" onclick="toggleLightboxIndicator('MMA')">&times;</span>
        </div>

        <div class="modal-body-indicator">
            <div class="upper-body">
                <div class="button-series">
                    <label class="mx-left">Period</label>
                    <input type="number"  id="mma_period" class="form-control col-md-15" value="20"/>
                </div>
            </div>
            <hr>
            <div class="lower-body">
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Description</b></label>
                    <label class="mx-left">A Modified Moving Average (MMA) (also known as Running Moving Average (RMA), or SMoothed Moving Average (SMMA)) is an indicator that shows the average value of a security's price over a period of time. It works very similar to the Exponential Moving Average, they are equivalent but for different periods (e.g. the MMA value for a 14-day period will be the same as EMA-value for a 27-days period).<br><br>MMA is partly calculated like SMA: the first point of the MMA is calculated the same way it is done for SMA. However, other points are calculated differently:the new price is added first and then the last average is subtracted from the resulting sum.</label>
                </div>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Parameters</b></label>
                    <label class="mx-left">MMA indicator has only one parameter: the period.</label>
                </div>
            </div>
            <hr>
            <div class="btn-body">
                <button class="btn form-control btn-primary col-md-2 btn-align-right" id="mma_indicator_btn">Add</button>
                <button class="btn form-control btn-danger col-md-2 btn-align-right" onclick="toggleLightboxIndicator('MMA')">Cancel</button>
            </div>
        </div>
    </div>
</div>
