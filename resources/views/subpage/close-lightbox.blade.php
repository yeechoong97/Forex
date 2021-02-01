<div id ="Position_box" class="lightbox">
               <div class="modal-content modal">
                  <div class="modal-header">
                     <div class="modal-title">Reduce/Close <i class="far fa-question-circle" onclick="toggleMainHelpLightbox('close')"></i></div>
                     <span aria-hidden="true" class="close" aria-label="Close" onclick="closeLightbox('Position_box')">&times;</span>
                  </div>
                  <div class="modal-body">
                     <div class="upper-body">
                        <div class="instrument-title" id="position-title">EUR/USD</div>
                           <div class="position-units">
                              <div class="units-label">Units Available :</div>
                              <div class="units-quantity" id="units_orders_quantity"></div>
                           </div>
                           <div class="second-units-title">Units to Close</div>
                           <div class="close-check">
                              <input type="number" id="position-total-units" class="form-control col-md-8 position-order-units" placeholder="Enter Units" onkeyup="updateRemaining()" onclick="updateRemaining()" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==7 && event.keyCode!=8) return false;"></input>
                              <span class="fas fa-check tick-close" id="tick-close" style="display:none"></span>    
                              <span class="fas fa-times cross-close" id="cross-close" style="display:none"></span>      
                           </div>
                     </div>

                     <div class="lower-body">
                        <div class="units-container">
                           <div class="left-units-percentage" id="first-left-units" onclick="openOrderBox('T',25)">25%</div>
                           <div class="units-percentage" id="second-left-units" onclick="openOrderBox('T',50)">50%</div>
                           <div class="units-percentage" id="third-left-units" onclick="openOrderBox('T',75)">75%</div>
                           <div class="right-units-percentage" id="fourth-left-units" onclick="openOrderBox('T',100)">100%</div>
                           <input type="hidden" id="hidden_percent" value=100></input>
                        </div>
                        <div class="detail-container">
                              <div class="title-label">Units Remaining :</div>
                              <div class="data-label" id="units_remaining"></div>
                              <div class="title-label">Profit/Loss :</div>
                              <div class="data-label" id="units-profit"></div>
                        </div>
                              <div>
                                 <span id="position-ticket-id" style="display:none"></span>
                                 <div class="chart-error-label" id="close-error-msg"></div>
                                 <div class="form-group chart-align-btn">
                                    <button type="submit" class="btn-primary form-control mx-auto col-md-5" onclick="closePosition()">Submit</button>
                                 </div>
                              </div>
                     </div>
                  </div>
               </div>
         </div>