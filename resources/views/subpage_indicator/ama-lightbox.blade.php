<div id ="AMA_indicator_box" class="lightbox">
    <div class="modal modal-content2">
        <div class="modal-header">
            <div class="modal-title">Adaptive Moving Average (AMA)</div>
            <span aria-hidden="true" class="close" aria-label="Close" onclick="toggleLightboxIndicator('AMA')">&times;</span>
        </div>

        <div class="modal-body-indicator">
            <div class="upper-body">
                <div class="button-series">
                    <label class="mx-left">Period</label>
                    <input type="text" id="ama_period" class="form-control col-md-10" value="20" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;"/>
                </div>
                <div class="button-series">
                    <label class="mx-left">Fast Period</label>
                    <input type="text" id="ama_fast" class="form-control col-md-10" value="2" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;" />
                </div>
                <div class="button-series">
                    <label class="mx-left">Slow Period</label>
                    <input type="text" id="ama_slow" class="form-control col-md-10" value="30" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;" />
                </div>
            </div>
            <hr>
            <div class="lower-body">
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Description</b></label>
                    <label class="mx-left">An Adaptive Moving Average (AMA) is an indicator similar to SMA, MMA and EMA. AMA changes its sensitivity due to the price fluctuations. The Adaptive Moving Average becomes more sensitive during periods when price is moving in a certain direction and becomes less sensitive to price movements when it become unstable.</label>
                </div>
                <br>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Parameters</b></label>
                    <label class="mx-left">AMA indicator parameters are: period, fast period and slow period.</label>
                </div>
            </div>
            <hr>
            <div class="btn-body">
                <button class="btn form-control btn-primary col-md-2 btn-align-right" id="ama_indicator_btn">Add</button>
                <button class="btn form-control btn-danger col-md-2 btn-align-right" onclick="toggleLightboxIndicator('AMA')">Cancel</button>
            </div>
        </div>
    </div>
</div>
