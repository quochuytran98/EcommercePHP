@extends('User.layout')
@section('body')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="ewSz2tBB"></script>
    <div class="product-details-area pt-100px pb-100px">
        <div class="container">
            <form >
                @csrf
          
            <div class="row">
                <div class="col-lg-5 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                    <!-- Swiper -->
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
                    <div class="swiper-container zoom-thumbs slider-nav-style-1 small-nav mt-3 mb-3">
                        <div class="swiper-wrapper">
                            <?php 
                               
                              
                              
                                for ($i=1; $i < Count(explode(',',$details->image)) ; $i++) { 
                             
                                  $arr = explode(',',$details->image)[$i];
                                  $arr1 = explode(',',$details->image)[1];
                                  ?> 
                            <div class="swiper-slide zoom-image-hover">
                                 
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="{{asset('public/image_product/'.$arr)}}" alt="">
                                    <input type="hidden"  value="{{$arr}}" class="cart_product_image">
                                </div>
                            </div>
                            <?php
                            
                        }
                      
                      ?> 
                   
                      <input type="hidden"  value="" class="cart_product_image}">
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
                
                <div class="col-lg-7 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
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
                                <button class="add-cart btn btn-primary btn-hover-primary ml-4" id="detailadd"  data-id="{{$details->id}}" type="button"> Add To
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
        </form>
        </div>
    </div>
    <div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a data-bs-toggle="tab" href="#des-details1" class="active">Description</a>
                    <a class="" data-bs-toggle="tab" href="#des-details2">Product Details</a>
                    <a data-bs-toggle="tab" href="#des-details3" class="">Reviews (<span class="fb-comments-count" data-href="{{Request::url()}}"></span>)</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane">
                        <div class="product-anotherinfo-wrapper">
                            <ul>
                                <li><span>Weight</span> 400 g</li>
                                <li><span>Dimensions</span>10 x 10 x 15 cm</li>
                                <li><span>Materials</span> 60% cotton, 40% polyester</li>
                                <li><span>Other Info</span> American heirloom jean shorts pug seitan letterpress</li>
                            </ul>
                        </div>
                    </div>
                    <div id="des-details1" class="tab-pane active">
                        <div class="product-description-wrapper">
                            <p>{{$details->description}}
                            </p>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div class="row">
                            <div class="fb-comments" data-href="{{Request::url()}}" data-width="1000" data-numposts="8"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="section pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <!-- section title start -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-left mb-11">
                    <h2 class="title">12 Other Products In The Same Category:</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($productCate as $item)
                
           
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6" data-aos="fade-up" data-aos-delay="200">
                                <!-- Single Prodect -->
                                <form>
                                    @csrf
                                <div class="product">
                                    <div class="thumb">
                                        <a href="{{route('details',$item->id)}}" class="image">
                                            <?php 
                                                $arr = "";
                                                for ($i=0; $i < Count(explode(',',$item->image)) ; $i++) { 
                                                $arr = explode(',',$item->image)[1];
                                                }
                                                ?>  
                                                <img src="{{asset('public/image_product/'.$arr)}}" alt="Product" />
                                                
                                                <input type="hidden"  value="{{$arr}}" class="cart_product_image_{{$item->id}}">
                                                <input type="hidden"  value="{{$item->id}}" class="cart_product_id_{{$item->id}}">
                                                <input type="hidden"  value="{{$item->name}}" class="cart_product_name_{{$item->id}}">
                                                <input type="hidden"  value="{{$item->price}}" class="cart_product_price_{{$item->id}}">
                                                <input type="hidden"  value="1" class="cart_product_quantity_{{$item->id}}">
                                            <?php
                                            ?> 
                                            {{-- <img class="hover-image" src="{{asset('public/User/assets/images/product-image/2.jpg')}}" alt="Product" /> --}}
                                        </a>
                                       
                                        
                                        <div class="actions">
                                            <a href="" class="action wishlist" title="Wishlist"><i
                                                    class="icon-heart"></i></a>
                                            <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                    class="icon-size-fullscreen"></i></a>
                                            <a href="" class="action compare" title="Compare"><i
                                                    class="icon-refresh"></i></a>
                                        </div>
                                        <button type="button" title="Add To Cart" class="add-to-cart" data-id="{{$item->id}}">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a href="{{route('details',$item->id)}}">{{$item->name}} </a></h5>
                                        <span class="price">
                                            <span class="new">${{ number_format($item->price)}} </span>
                                        </span>
                                    </div>
                                </div>
                            </form>
                                
                            </div>
            @endforeach
        </div><!-- section title start -->
        
    </div>
</div>
<div class="section pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <!-- section title start -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-left mb-11">
                    <h2 class="title">You Might Also Like:</h2>
                </div>
            </div>
        </div>
        <!-- section title start -->
      
        <!-- Single Prodect -->
        <div class="row">
            @foreach ($productBrand as $item)
                
           
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6" data-aos="fade-up" data-aos-delay="200">
                                <!-- Single Prodect -->
                                <form>
                                    @csrf
                                <div class="product">
                                    <div class="thumb">
                                        <a href="{{route('details',$item->id)}}" class="image">
                                            <?php 
                                                $arr = "";
                                                for ($i=0; $i < Count(explode(',',$item->image)) ; $i++) { 
                                                $arr = explode(',',$item->image)[1];
                                                }
                                                ?>  
                                                <img src="{{asset('public/image_product/'.$arr)}}" alt="Product" />
                                                
                                                <input type="hidden"  value="{{$arr}}" class="cart_product_image_{{$item->id}}">
                                                <input type="hidden"  value="{{$item->id}}" class="cart_product_id_{{$item->id}}">
                                                <input type="hidden"  value="{{$item->name}}" class="cart_product_name_{{$item->id}}">
                                                <input type="hidden"  value="{{$item->price}}" class="cart_product_price_{{$item->id}}">
                                                <input type="hidden"  value="1" class="cart_product_quantity_{{$item->id}}">
                                            <?php
                                            ?> 
                                            {{-- <img class="hover-image" src="{{asset('public/User/assets/images/product-image/2.jpg')}}" alt="Product" /> --}}
                                        </a>
                                       
                                        
                                        <div class="actions">
                                            <a href="" class="action wishlist" title="Wishlist"><i
                                                    class="icon-heart"></i></a>
                                            <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                    class="icon-size-fullscreen"></i></a>
                                            <a href="" class="action compare" title="Compare"><i
                                                    class="icon-refresh"></i></a>
                                        </div>
                                        <button type="button" title="Add To Cart" class="add-to-cart" data-id="{{$item->id}}">Add
                                            To Cart</button>
                                    </div>
                                    <div class="content">
                                        <h5 class="title"><a href="{{route('details',$item->id)}}">{{$item->name}} </a></h5>
                                        <span class="price">
                                            <span class="new">${{ number_format($item->price)}} </span>
                                        </span>
                                    </div>
                                </div>
                            </form>
                                
                            </div>
            @endforeach
        </div>
        <!-- Single Prodect -->
   
    </div>
    <!-- Add Arrows -->
    <div class="swiper-buttons">
        <div class="swiper-button-next swiper-button-disabled" tabindex="-1" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-9740d87f010101936c" aria-disabled="true"></div>
        <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-9740d87f010101936c" aria-disabled="false"></div>
    </div>
<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
</div>
<script>
    $(document).ready(function(){
        var total = $('#totalcart').data('id');
        
      $('#detailadd').click(function(){
          
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
                        swal("Added to cart");

                }

            });
  
              
              
        });
       
    });
  </script>
@endsection