@extends('User.layout')
@section('body')

    <!-- Hero/Intro Slider Start -->
    <div class="section ">
        <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1 dot-color-white">
            <!-- Hero slider Active -->
            <div class="swiper-wrapper">
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height-2 swiper-slide d-flex">
                    <div class="hero-bg-image">
                        <video src="https://content.rolex.com/dam/new-watches-2021/homepage/video-banner/homepage-exploration-push-dot-org.mp4" type="video/mp4" autoplay="" playsinline="" loop="" preload="auto" class="sc-qYsuA jDsubJ" __idm_id__="182398983"></video>
                        {{-- <img src="https://htmldemo.hasthemes.com/furns/furns/assets/images/slider-image/slider-2-1.jpg" alt=""> --}}
                    </div>
                    <div class="container align-self-center">
                        <div class="row justify-content-center">
                            <div class="col-md-8 offset-2 align-self-center m-auto">
                                <div class="hero-slide-content hero-slide-content-2 slider-animated-1 text-center">
                                    <span class="category">New Collection</span>
                                    <h2 class="title-1">#BigBangIntegral</h2>
                                    <p class="w-100">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore et dolore magna</p>
                                    <a href="#" class="btn btn-lg btn-primary btn-hover-dark mt-5">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height-2 swiper-slide d-flex text-center">
                    <div class="hero-bg-image">
                        <img src="https://www.louisvuitton.com/images/louis-vuitton--U_Fa_Les_Colognes_On_The_Beach_DIE.jpg?wid=2048" alt="">
                    </div>
                    <div class="container align-self-center">
                        <div class="row justify-content-center">
                            <div class="col-md-8 offset-2 align-self-center m-auto">
                                <div class="hero-slide-content hero-slide-content-2 slider-animated-1">
                                    <span class="category">New Perfume</span>
                                    <h2 class="title-1">Flexible Sofa Set</h2>
                                    <p class="w-100">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore et dolore magna</p>
                                    <a href="#" class="btn btn-lg btn-primary btn-hover-dark mt-5">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <!-- Hero/Intro Slider End -->

    <!-- Banner Section Start -->
  
    <!-- Banner Section End -->

    <!-- Product tab Area Start -->
    <div class="section product-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" data-aos="fade-up">
                    <div class="section-title mb-0">
                        <h2 class="title">Our Products</h2>
                        <p class="sub-title mb-6">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore</p>
                    </div>
                </div>

                <!-- Tab Start -->
                <div class="col-md-12 text-center mb-8" data-aos="fade-up" data-aos-delay="200">
                    <ul class="product-tab-nav nav justify-content-center">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#tab-product-new-arrivals">New Products</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#tab-product-best-sellers">Feature Products </a></li>
                        
                    </ul>
                </div>
                <!-- Tab End -->
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content">
                        <!-- 1st tab start -->
                        <div class="tab-pane fade show active" id="tab-product-new-arrivals">
                            <div class="row">
                                @foreach ($newProduct as $item)
                                    
                             
                                   
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
                                                    <img style="width: 600px; height:510" src="{{asset('public/image_product/'.$arr)}}" alt="Product" />
                                                    
                                                    <input type="hidden"  value="{{$arr}}" class="cart_product_image_{{$item->id}}">
                                                    <input type="hidden"  value="{{$item->id}}" class="cart_product_id_{{$item->id}}">
                                                    <input type="hidden"  value="{{$item->name}}" class="cart_product_name_{{$item->id}}">
                                                    <input type="hidden"  value="{{$item->price}}" class="cart_product_price_{{$item->id}}">
                                                    <input type="hidden"  value="1" class="cart_product_quantity_{{$item->id}}">
                                                <?php
                                                ?> 
                                                {{-- <img class="hover-image" src="{{asset('public/User/assets/images/product-image/2.jpg')}}" alt="Product" /> --}}
                                            </a>
                                           
                                            <span class="badges">
                                                <span class="new">New</span>
                                            </span>
                                            <div class="actions">
                                                <button type="button" class="action wishlist" data-id="{{$item->id}}" id="Wishlist" title="Wishlist"><i
                                                        class="icon-heart"></i></button>
                                                <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-id="{{$item->id}}" id="quickview" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                        class="icon-size-fullscreen"></i></a>
                                                <a href="" class="action compare" title="Compare"><i
                                                        class="icon-refresh"></i></a>
                                            </div>
                                            <button type="button" title="Add To Cart" style="background-color: #ff7004; font-color: #fff" class="add-to-cart" data-id="{{$item->id}}">Add
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
                        </div>
                        <!-- 1st tab end -->
                        <!-- 2nd tab start -->
                        <div class="tab-pane fade" id="tab-product-best-sellers">
                            <div class="row">
                                @foreach ($featureProduct as $item)
                                    
                               
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
                                           
                                            <span class="badges">
                                                <span class="sale">Hot</span>
                                            </span>
                                            <div class="actions">
                                                <button type="button" class="action wishlist" data-id="{{$item->id}}" id="Wishlist" title="Wishlist"><i
                                                    class="icon-heart"></i></button>
                                                <a href="#" class="action quickview" data-link-action="quickview" data-id="{{$item->id}}" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                        class="icon-size-fullscreen"></i></a>
                                                <a href="" class="action compare" title="Compare"><i
                                                        class="icon-refresh"></i></a>
                                            </div>
                                            <button type="button" title="Add To Cart" style="background-color: #ff7004; font-color: #fff"  class="add-to-cart" data-id="{{$item->id}}">Add
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
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product tab Area End -->
    <div class="section pb-100px">
        <div class="container">
            <!-- section title start -->
            <div class="row">
                <div class="col-md-12" data-aos="fade-up">
                    <div class="section-title text-center mb-11">
                        <h2 class="title">All Products</h2>
                        <p class="sub-title">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($show_product as $item)
                    
               
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
                                                <button type="button" class="action wishlist" data-id="{{$item->id}}" id="Wishlist" title="Wishlist"><i
                                                    class="icon-heart"></i></button>
                                                <a href="#" class="action quickview" data-link-action="quickview" data-id="{{$item->id}}" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                        class="icon-size-fullscreen"></i></a>
                                                <a href="" class="action compare" title="Compare"><i
                                                        class="icon-refresh"></i></a>
                                            </div>
                                            <button type="button" title="Add To Cart" style="background-color: #ff7004; font-color: #fff"  class="add-to-cart" data-id="{{$item->id}}">Add
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
            <!-- section title start -->
           
        </div>
    </div>
    <!-- Banner Section Start -->
    <div class="section pb-100px pt-100px">
        <div class="container-fluid">
            <!-- Banners Start -->
            <div class="row">
                <!-- Banner Start -->
                <div class="col-lg-6 col-md-6 col-12 mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                    <a href="shop-left-sidebar.html" class="banner-3">
                        <img src="{{asset('public/User/assets/images/banner/1.png')}}" alt="" />
                        <div class="info justify-content-end">
                            <div class="content align-self-center">
                                <h3 class="title" style="color: aliceblue" >
                                    Sale Furniture <br /> For Summer
                                </h3>
                                <p style="color: aliceblue">Great Discounts Here</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Banner End -->

                <!-- Banner Start -->
                <div class="col-lg-6 col-md-6 col-12" data-aos="fade-up" data-aos-delay="200">
                    <a href="shop-left-sidebar.html" class="banner-3">
                        <img src="{{asset('public/User/assets/images/banner/2.png')}}" alt="" />
                        <div class="info justify-content-start">
                            <div class="content align-self-center">
                                <h3 class="title" style="color: aliceblue">
                                    Office Chair <br /> For Best Offer</h3>
                                <p style="color: aliceblue">Great Discounts Here</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Banner End -->
            </div>
            <!-- Banners End -->
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- New Product Start -->
    

    <!-- New Product End -->


    <!--  Blog area Start -->
    <div class="main-blog-area pb-100px">
        <div class="container">
            <!-- section title start -->
            <div class="row">
                <div class="col-md-12" data-aos="fade-up">
                    <div class="section-title text-center mb-11">
                        <h2 class="title">Latest News</h2>
                        <p class="sub-title">Torem ipsum dolor sit amet, consectetur adipisicing elitsed do eiusmo tempor incididunt ut labore
                        </p>
                    </div>
                </div>
            </div>
            <!-- section title start -->
            <div class="blog-slider swiper-container slider-nav-style-1" data-aos="fade-up" data-aos-delay="200">
                <!-- Start single blog -->
                <div class="swiper-wrapper">
                    <div class="single-blog swiper-slide">
                        <div class="blog-image">
                            <a href="blog-single-left-sidebar.html"><img src="{{asset('public/User/assets/images/banner/h5.jpg')}}" class="img-responsive w-100" alt=""></a>
                        </div>
                        <div class="blog-text">
                            <div class="blog-athor-date">
                                <a class="blog-date" href="#">14 November</a>
                            </div>
                            <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single-left-sidebar.html">Interior design is the art.</a></h5>
                            <p class="blog-detail-text">Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididu ut labore et dolore magna aliqua.</p>

                            <a href="#" class="btn btn-lg btn-hover-color-primary btn-color-dark mt-5">Read More</a>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <div class="single-blog swiper-slide">
                        <div class="blog-image">
                            <a href="blog-single-left-sidebar.html"><img src="{{asset('public/User/assets/images/banner/h3.jpg')}}" class="img-responsive w-100" alt=""></a>
                        </div>
                        <div class="blog-text">
                            <div class="blog-athor-date">
                                <a class="blog-date" href="#">14 November</a>
                            </div>
                            <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single-left-sidebar.html">Decorate your home with furns.</a></h5>
                            <p class="blog-detail-text">Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididu ut labore et dolore magna aliqua.</p>

                            <a href="#" class="btn btn-lg btn-hover-color-primary btn-color-dark mt-5">Read More</a>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <div class="single-blog swiper-slide">
                        <div class="blog-image">
                            <a href="blog-single-left-sidebar.html"><img src="{{asset('public/User/assets/images/banner/h2.jpeg')}}" class="img-responsive w-100" alt=""></a>
                        </div>
                        <div class="blog-text">
                            <div class="blog-athor-date">
                                <a class="blog-date" href="#">14 November</a>
                            </div>
                            <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single-left-sidebar.html">Spatialize with that the furns.</a></h5>
                            <p class="blog-detail-text">Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididu ut labore et dolore magna aliqua.</p>

                            <a href="#" class="btn btn-lg btn-hover-color-primary btn-color-dark mt-5">Read More</a>
                        </div>
                    </div>
                    <!-- End single blog -->
                    <div class="single-blog swiper-slide">
                        <div class="blog-image">
                            <a href="blog-single-left-sidebar.html"><img src="{{asset('public/User/assets/images/banner/h1.jpg')}}" class="img-responsive w-100" alt=""></a>
                        </div>
                        <div class="blog-text">
                            <div class="blog-athor-date">
                                <a class="blog-date" href="#">14 November</a>
                            </div>
                            <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single-left-sidebar.html">Unique products will impress.</a></h5>
                            <p class="blog-detail-text">Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididu ut labore et dolore magna aliqua.</p>

                            <a href="#" class="btn btn-lg btn-hover-color-primary btn-color-dark mt-5">Read More</a>
                        </div>
                    </div>
                    <!-- End single blog -->
                </div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    

  
    
<script>
  $(document).ready(function(){
    $('.add-to-cart').click(function(){
        
        var id = $(this).data('id');
       
        var cart_product_id = $('.cart_product_id_'+id).val();
        var cart_product_name = $('.cart_product_name_'+id).val();
        var cart_product_image = $('.cart_product_image_'+id).val();
        var cart_product_price = $('.cart_product_price_'+id).val();
        var qty = 1;
        var cart_product_quantity =parseInt(qty);
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
                       var a = parseInt(qty) +1;
                       $('.quochuy').text(a);
                        swal("Added to cart");

                }

            });

            
            
      });
     
      $('.wishlist').click(function(){
        //swal("Here's the title!", "...and here's the text!");
        var id = $(this).data('id');
       
         var wishlist = $('.cart_product_id_'+id).val();
         var cart_product_name = $('.cart_product_name_'+id).val();
        var cart_product_image = $('.cart_product_image_'+id).val();
        var cart_product_price = $('.cart_product_price_'+id).val();
        // var _token = $('input[name="_token"]').val();
        // var url="{{route('wishlist')}}";  
       var newItem = {
           'id' : wishlist,
           'name' : cart_product_name,
           'image' : cart_product_image,
           'price' : cart_product_price
       }
       if(localStorage.getItem('data') == null){
            localStorage.setItem('data','[]');
           
       }
       
     
       var old_data = JSON.parse(localStorage.getItem('data'));
       old_data.push(newItem);
    //    var check = $.grep(old_data,function(obj){
    //        return obj.id;
    //    });
    //    if(check.length){
    //        alert('FAILSS');
    //    }else{
            
    //    }
      
      // var old_data = JSON.parse(localStorage.getItem('data'));
        // $.ajax({
        //         url:url,
        //         method: 'POST',
        //         data:{
        //             wishlist:wishlist,
        //             cart_product_name:cart_product_name,
        //             cart_product_image:cart_product_image,
        //             cart_product_price:cart_product_price,
        //             _token:_token
        //         },
        //         success:function(s){
        //              alert(s);
        //             //    var qty = $('.quochuy').text();
        //             //    var a = parseInt(qty) +1;
        //             //    $('.quochuy').text(a);
                        
        //             //swal("Hello world!");
        //         }

        //     });

            
            
      });

      $('.quickview').click(function(){
        //swal("Here's the title!", "...and here's the text!");
        var id = $(this).data('id');
       
        var quickview_id = $('.cart_product_id_'+id).val();
        
        var _token = $('input[name="_token"]').val();
        var url="{{route('quickview')}}";  
       
        $.ajax({
                url:url,
                method: 'POST',
                data:{
                    quickview_id:quickview_id,
                    
                    _token:_token},
                success:function(s){
                        $('.modal-content').html(s);
                   
                        

                }

            });

            
            
      });
     
  });
</script>


    
@endsection