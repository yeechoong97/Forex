
<div id ="order-history-lightbox" class="lightbox" >
    <div class="modal modal-content3">
        <div class="modal-header3">
            <div class="modal-title">Help<span aria-hidden="true" class="close" aria-label="Close" onclick="toggleOrderLightbox()">&times;</span>
            </div>
        </div>
        <div class="carousel slide" data-interval="false" id="carousel-1">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-item-div">
                            <div class="item-div-size-1 item-desc-adjust">
                                <img src="{{asset('pictures/MainOrderScreen.png')}}" class="img-customization-1" alt="Main">
                                <ul class="mx-auto item-desc item-desc-adjust">
                                    <li>You can view all the <b class="l-size">Completed</b> order details within your account. </li>
                                    <li>The <b class="l-size">Incomplete</b> or <b class="l-size">Ongoing</b> orders only can be viewed in the home page </li>
                                </ul>            
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-item-div">
                            <div class="item-div-size-3">
                                <img src="{{asset('pictures/StartDate.png')}}" class="img-customization-3" alt="Start Date">
                                <ul class="mx-auto item-desc">
                                    <li>You can click the calendar button to specify the start date.</li>
                                    <li>All the orders within the range will be previewed in the table.</li>
                                </ul>            
                            </div>
                            <div class="item-div-size-3">
                                <img src="{{asset('pictures/SortTable.png')}}" class="img-customization-3" alt="Sort Table">
                                <ul class="mx-auto item-desc">
                                    <li>You can click the arrow button to sort the results according to your preference.</li>
                                </ul>            
                            </div>
                            <div class="item-div-size-3">
                                <img src="{{asset('pictures/Pagination.png')}}" class="img-customization-3" alt="Pagination">
                                <ul class="mx-auto item-desc">
                                    <li>You can click the button to view the following order details in the next page.</li>
                                    <b class="l-size">*</b>The button will not be shown unless the total orders are more than 9.
                                </ul>            
                            </div>
                        </div>
                    </div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                </ol>
        </div>
    </div>
</div>

