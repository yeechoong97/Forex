<div id ="Lightbox" class="lightbox">
               <div class="modal-content modal">
                  <div class="modal-header">
                     <div class="modal-title">Order <i class="far fa-question-circle" onclick="toggleMainHelpLightbox('buy')"></i></div>
                     <span aria-hidden="true" class="close" aria-label="Close" onclick="closeLightbox('Lightbox')">&times;</span>
                  </div>
                  <div class="modal-body">
                     <div class="upper-body">
                        <div class="instrument-title" id="lightbox-title">EUR/USD</div>
                           <div class="order-container">
                              <div class="order-sell" id="order-sell">
                                 <a href="#" class="order-btns" onclick="openLightbox('sell')">
                                    <span class="buy-span-title">SELL</span>
                                    <span class="buy-span-data" id="order-sell-data"></span>
                                 </a>
                              </div>
                              <div class="order-buy" id="order-buy">
                                 <a href="#" class="order-btns" onclick="openLightbox('buy')">
                                    <span class="buy-span-title">BUY</span>
                                    <span class="buy-span-data" id="order-buy-data"></span>
                                 </a>
                              </div>
                           </div>
                           <div class="order-spread">
                              <span class="spread-span-data" id="order-spread-data"></span>
                           </div>
                           <div class="lower-title">Market</div>
                        </div>
                     <div class="lower-body">
                        <div class="unit-check">
                              <input type="number" id="order-units" class="form-control col-md-8 units" placeholder="Enter Units" onkeyup="validateUnits()" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==7 && event.keyCode!=8) return false;"></input> 
                              <span class="fas fa-check tick-check" id="tick" style="display:none"></span>    
                              <span class="fas fa-times cross-check" id="cross" style="display:none"></span>      
                        </div>
                           <span class="unit-remark"><b>*</b>Units Available: 1,000,000</span>
                           <div class="margin-check">
                              <div class="label">Margin Required: </div>
                              <div class="value" id="margin-value">0</div>
                           </div>
                              <div>
                                 <span id="order-type" style="display:none"></span>
                                 <div class="chart-error-label" id="order-error-msg"></div>
                                 <div class="form-group chart-align-btn">
                                    <button type="submit" class="btn-primary form-control mx-auto col-md-5" onclick="saveOrder()">Submit</button>
                                 </div>
                              </div>
                              
                     </div>
                  </div>
               </div>
         </div>