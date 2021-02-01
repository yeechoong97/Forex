<div id ="PSAR_indicator_box" class="lightbox">
    <div class="modal modal-content2">
        <div class="modal-header">
            <div class="modal-title">Parabolic SAR (PSAR)</div>
            <span aria-hidden="true" class="close" aria-label="Close" onclick="toggleLightboxIndicator('PSAR')">&times;</span>
        </div>

        <div class="modal-body-indicator">
            <div class="upper-body add-height">
                <div class="button-series decrease-width">
                    <label class="mx-left">Acceleration Factor Start</label>
                    <input type="text" id="psar_start" class="form-control col-md-10" value="0.02" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;"/>
                </div>
                <div class="button-series">
                    <label class="mx-left">Acceleration Factor Increment</label>
                    <input type="text" id="psar_increment" class="form-control col-md-10" value="0.02" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;" />
                </div>
                <div class="button-series">
                    <label class="mx-left">Acceleration Factor Maximum</label>
                    <input type="text" id="psar_max" class="form-control col-md-10" value="0.2" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;" />
                </div>
            </div>
            <hr>
            <div class="lower-body decrease-height">
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Description</b></label>
                    <label class="mx-left">Parabolic SAR (SAR - stop and reverse) is a method devised by J. Welles Wilder, Jr, to find trends in market prices or securities. It may be used as a trailing stop loss based on prices tending to stay within a parabolic curve during a strong trend.</label>
                </div>
                <br>
                <div class="description-series">
                    <label class="mx-left"><b class="l-size">Parameters</b></label>
                    <label class="mx-left">There are three parameters a PSAR indicator has. They are the acceleration factor start, acceleration factor increment and acceleration factor maximum.</label>
                </div>
            </div>
            <hr>
            <div class="btn-body">
                <button class="btn form-control btn-primary col-md-2 btn-align-right" id="psar_indicator_btn">Add</button>
                <button class="btn form-control btn-danger col-md-2 btn-align-right" onclick="toggleLightboxIndicator('PSAR')">Cancel</button>
            </div>
        </div>
    </div>
</div>
