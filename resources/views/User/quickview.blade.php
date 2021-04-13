<div class="modal-body">
    <div class="row">
        <div class="col-md-5 col-sm-12 col-xs-12 mb-lm-30px mb-sm-30px">
            <!-- Swiper -->
            <div class="swiper-container gallery-top mb-4">
                <div class="swiper-container zoom-top">
                    <div class="swiper-wrapper">
                        <?php 
                           
                            for ($i=1; $i < Count(explode(',',$details->image)) ; $i++) { 
                         
                              $arr = explode(',',$details->image)[$i];
                           
                              ?>  
                             <div class="swiper-slide zoom-image-hover">
                           
                            
                             <img class="img-responsive m-auto" src="{{asset('public/image_product/'.$arr)}}" alt="">
                      
                    
                        
                            </div>
                  
                        <?php
                          }
                        ?> 
                    </div>
                </div>
            </div>
            <div class="swiper-container zoom-thumbs slider-nav-style-1 small-nav mt-3 mb-3">
                <div class="swiper-wrapper">
                    <?php 
                       
                      
                      
                        for ($i=1; $i < Count(explode(',',$details->image)) ; $i++) { 
                     
                          $arr = explode(',',$details->image)[$i];
                          $arr1 = explode(',',$details->image)[1];
                          ?> 
                    
                    <input type="hidden"  value="{{$arr}}" class="cart_product_image">
                    <?php
                    
                }
              
              ?> 
           
             
              <input type="hidden"  value="{{$details->id}}" class="cart_product_id_{{$details->id}}">
              <input type="hidden"  value="{{$details->name}}" class="cart_product_name_{{$details->id}}">
              <input type="hidden"  value="{{$details->price}}" class="cart_product_price_{{$details->id}}">
             
                    
                   
                </div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-sm-12 col-xs-12">
            <div class="product-details-content quickview-content">
                    
                <h2 id="name" >{{$details->name}}</h2>
                <p class="reference">Brand:<span> {{$details->brandName}}</span></p>
                <div class="pro-details-rating-wrap">
                    <div class="rating-product">
                        <i class="ion-android-star"></i>
                        <i class="ion-android-star"></i>
                        <i class="ion-android-star"></i>
                        <i class="ion-android-star"></i>
                        <i class="ion-android-star"></i>
                    </div>
                    <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span>
                </div>
                <div class="pricing-meta">
                    <ul>
                        <li class="old-price not-cut" data-id="{{$details->price}}">${{ number_format($details->price)}}</li>
                    </ul>
                </div>
                <p class="quickview-para">{{$details->description}}</p>
                <div class="pro-details-quality">
                    <div class="cart-plus-minus"><div class="dec qtybutton">-</div>
                        <input class="cart-plus-minus-box" type="text" name="qtybutton" id="cart_product_quantity" value="1">
                    <div class="inc qtybutton">+</div></div>
                    <div class="pro-details-cart">
                        <button class="add-cart btn btn-primary btn-hover-primary ml-4" id="detailadd1"  data-id="{{$details->id}}" type="button"> Add To
                            Cart</button>
                    </div>
                </div>
                <div class="pro-details-wish-com">
                    <div class="pro-details-wishlist">
                        <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>Add to
                            wishlist</a>
                    </div>
                    <div class="pro-details-compare">
                        <a href="compare.html"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                    </div>
                </div>
                <div class="pro-details-social-info">
                    <span>Share</span>
                    <div class="social-info">
                        <ul class="d-flex">
                            <li>
                                <a href="#"><i class="ion-social-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="ion-social-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="ion-social-google"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="ion-social-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pro-details-policy">
                    <ul>
                        <li><img src="{{asset('public/User/assets/images/icons/policy.png')}}" alt=""><span>Security Policy (Edit With
                                Customer Reassurance Module)</span></li>
                        <li><img src="{{asset('public/User/assets/images/icons/policy-2.png')}}" alt=""><span>Delivery Policy (Edit
                                With Customer Reassurance Module)</span></li>
                        <li><img src="{{asset('public/User/assets/images/icons/policy-3.png')}}" alt=""><span>Return Policy (Edit With
                                Customer Reassurance Module)</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var total = $('#totalcart').data('id');
        
      $('#detailadd1').click(function(){
          
        var id = $(this).data('id');
       
        var cart_product_id = $('.cart_product_id_'+id).val();
        var cart_product_name = $('.cart_product_name_'+id).val();
        var cart_product_image = $('.cart_product_image').val();
        var cart_product_price = $('.cart_product_price_'+id).val();
        
        var cart_product_quantity =$('#cart_product_quantity').val();
        var _token = $('input[name="_token"]').val();
        var url="{{route('add_cart')}}";  
     
        $.ajax({
                url:url,
                method: 'POST',
                data:{
                    cart_product_id:cart_product_id,
                    cart_product_name:cart_product_name,
                    cart_product_image:cart_product_image,
                    cart_product_price:cart_product_price,
                    cart_product_quantity:cart_product_quantity,
                    _token:_token},
                success:function(s){
                       $('.inner').html(s);
                       
                       var qty = $('.quochuy').text();
                       var a = parseInt(qty) + parseInt(cart_product_quantity);
                       $('.quochuy').text(a);
                        swal("Hello world!");

                }

            });
  
              
              
        });
       
    });
  </script>