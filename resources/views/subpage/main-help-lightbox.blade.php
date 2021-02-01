<div id ="main-help-lightbox" class="lightbox" >
    <div class="modal modal-content3">
        <div class="modal-header3">
            <div class="modal-title">Help<span aria-hidden="true" class="close" aria-label="Close" onclick="toggleMainHelpLightbox('close')">&times;</span>
            </div>
        </div>
        <div class="carousel slide" data-interval="false" id="carousel-1">
                <div class="carousel-inner">
                    <div class="carousel-item" id="account-lightbox">
                        <div class="carousel-item-div">
                            <div class="item-div-size-3">
                                <img src="{{asset('pictures/Account.png')}}" class="img-customization-1" alt="MainFunds">
                                <ol class="mx-auto item-desc">
                                    <li><b class="l-size">Currency</b> - The type of currency used for trading.</li>
                                    <li><b class="l-size">Balance</b> - The current available balance of the account.</li>
                                    <li><b class="l-size">Margin</b> - Margin is essentially the amount of money that a trader needs to put forward in order to place a trade and maintain the position.</li>
                                    <li><b class="l-size">Margin Used</b> - The percentage of margin used in the account.</li>
                                    <li><b class="l-size">Leverage</b> - The ratio of the trader's funds to the size of the broker's credit.</li>
                                </ol>            
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" id="rates-lightbox">
                        <div class="carousel-item-div">
                            <div class="item-div-size-3">
                                <img src="{{asset('pictures/Rates1.png')}}" class="img-customization-1" alt="Start Date">
                                <ol class="mx-auto item-desc item-desc-adjust">
                                    <li><b class="l-size">Rates Container</b> (<b class="l-size">With</b> Color)</b> - The currency rate is <b class="l-size">selected.</b></li>
                                    <li><b class="l-size">Rates Container</b> (<b class="l-size">Without</b> Color)</b> - The currency rate is <b class="l-size">NOT selected.</b></li>
                                </ol>            
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" id="rates-lightbox1">
                        <div class="carousel-item-div">
                            <div class="item-div-size-3 item-desc-adjust">
                                <img src="{{asset('pictures/Rates2.png')}}" class="img-customization-1" alt="Start Date">
                                <ol class="mx-auto item-desc item-desc-adjust">
                                    <li><b class="l-size">EUR/USD</b> - Name of the Currency pair</li>
                                    <li><b class="l-size">1.20910</b> - Sell price of the currency pair</li>
                                    <li><b class="l-size">1.20926</b> - Buy price of the currency pair</li>
                                    <li><b class="l-size">1.6</b> - Spread (difference between the sell price and the buy price)</li>
                                </ol>            
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" id="order-lightbox">
                        <div class="carousel-item-div">
                            <div class="item-div-size-3 item-desc-adjust">
                                <img src="{{asset('pictures/Order1.png')}}" class="img-customization-1" alt="Start Date">
                                <ol class="mx-auto item-desc item-desc-adjust">
                                    <li><b class="l-size">TicketID</b> - ID of the order </li>
                                    <li><b class="l-size">Date</b> - Date of the order made</li>
                                    <li><b class="l-size">Pair</b> - Currency pair used of the order.</li>
                                    <li><b class="l-size">Units</b> - Available units of the order</li>
                                </ol>            
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" id="order-lightbox1">
                        <div class="carousel-item-div">
                            <div class="item-div-size-3 item-desc-adjust">
                                <img src="{{asset('pictures/Order2.png')}}" class="img-customization-1" alt="Start Date">
                                <ol class="mx-auto item-desc">
                                    <li><b class="l-size">Type</b> - Type of order.</li>
                                    <b class="l-size">*Long</b> - The buy initiation of the order<br/>
                                    <b class="l-size">*Short</b> - The sell initiation of the order
                                    <li><b class="l-size">Margin</b> - Margin required to maintain the order</li>
                                    <li><b class="l-size">Price</b> - Entry price of the order</li>
                                    <li><b class="l-size">Current</b> - Current price of the currency pair</li>
                                </ol>            
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" id="order-lightbox2">
                        <div class="carousel-item-div">
                            <div class="item-div-size-3 item-desc-adjust">
                                <img src="{{asset('pictures/Order3.png')}}" class="img-customization-1" alt="Start Date">
                                <ol class="mx-auto item-desc item-desc-adjust">
                                    <li><b class="l-size">Profit(USD)</b> - Profit/Loss of the order in <b class="l-size">USD</b> format</li>
                                    <li><b class="l-size">Profit(Pips)</b> - Profit/Loss of the order in <b class="l-size">spread</b> format</li>
                                    <li><b class="l-size">Profits(%)</b> - Profit/Loss of the order in <b class="l-size">percentage</b> format</li>
                                    <li><b class="l-size">Action</b> - Button of closing order</li>
                                </ol>            
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" id="buy-lightbox">
                        <div class="carousel-item-div">
                            <div class="item-div-size-3">
                                <img src="{{asset('pictures/BuyOrder.png')}}" class="img-customization-1" alt="Start Date">
                                <ol class="mx-auto item-desc">
                                    <li><b class="l-size">EUR/USD</b> - Currency pair selected</li>
                                    <li><b class="l-size">SELL (1.20871)</b> - Selling price of selected currency pair</li>
                                    <li><b class="l-size">BUY (1.20886)</b> - Buying price of selected currency pair</li>
                                    <li><b class="l-size">1.5</b> - Spread of the currency pair</li>
                                    <li><b class="l-size">Text Box</b> - Amount of units to be entered for the order</li>
                                    <li><b class="l-size">Margin Required</b> - Margin required to maintain the order</li>
                                    <li><b class="l-size">Submit</b> - Click to submit the order</li>
                                </ol>            
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" id="close-lightbox">
                        <div class="carousel-item-div">
                            <div class="item-div-size-3">
                                <img src="{{asset('pictures/ClosePosition.png')}}" class="img-customization-1" alt="Start Date">
                                <ol class="mx-auto item-desc">
                                    <li><b class="l-size">EUR/USD</b> - Currency pair selected</li>
                                    <li><b class="l-size">1000</b> - Units available for the order</li>
                                    <li><b class="l-size">Text Box</b> - Units to be entered to reduce/close order</li>
                                    <li><b class="l-size">100%</b> - Calculate the units for closing the order according user's choice.</li>
                                    <li><b class="l-size">0</b> - Remaining of units for the order</li>
                                    <li><b class="l-size">-3.12</b> - Profit/Loss to reduce/close the order</li>
                                    <li><b class="l-size">Submit</b> - Click to reduce/close the order</li>
                                </ol>            
                            </div>
                        </div>
                    </div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" id="account-lightbox-indicator" class=""></li>
                    <li data-target="#carousel-1" data-slide-to="1" id="rates-lightbox-indicator" class=""></li>
                    <li data-target="#carousel-1" data-slide-to="2" id="rates-lightbox-indicator1" class=""></li>
                    <li data-target="#carousel-1" data-slide-to="3" id="order-lightbox-indicator" class=""></li>
                    <li data-target="#carousel-1" data-slide-to="4" id="order-lightbox-indicator1" class=""></li>
                    <li data-target="#carousel-1" data-slide-to="5" id="order-lightbox-indicator2" class=""></li>
                    <li data-target="#carousel-1" data-slide-to="6" id="buy-lightbox-indicator" class=""></li>
                    <li data-target="#carousel-1" data-slide-to="7" id="close-lightbox-indicator" class=""></li>
                </ol>
        </div>
    </div>
</div>

