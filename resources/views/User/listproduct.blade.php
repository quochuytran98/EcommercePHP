@extends('User.layout')
@section('body')
@php
    if(isset($_GET['key'])){
        echo $_GET['key'];
    }
@endphp
<div class="shop-category-area pb-100px pt-70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar d-flex">
                    <!-- Left Side start -->
                    <p>All Products.</p>
                    <!-- Left Side End -->
                    <!-- Right Side Start -->
                    <div class="select-shoing-wrap d-flex align-items-center">
                        <div class="shot-product">
                            <p>Sort By:</p>
                        </div>
                        <div class="shop-select">
                            <select class="shop-sort" style="display: none;">
                                <option data-display="Relevance">Relevance</option>
                                <option value="1"> Name, A to Z</option>
                                <option value="2"> Name, Z to A</option>
                                <option value="3"> Price, low to high</option>
                                <option value="4"> Price, high to low</option>
                            </select><div class="nice-select shop-sort" tabindex="0"><span class="current">Relevance</span><ul class="list"><li data-value="Relevance" data-display="Relevance" class="option selected">Relevance</li><li data-value="1" class="option"> Name, A to Z</li><li data-value="2" class="option"> Name, Z to A</li><li data-value="3" class="option"> Price, low to high</li><li data-value="4" class="option"> Price, high to low</li></ul></div>

                        </div>
                    </div>
                    <!-- Right Side End -->
                </div>
                <!-- Shop Top Area End -->

                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area">

                    <div class="row">
                        @if (Count($product)> 0)
                            
                   
                      

                   
                        @foreach ($product as $item)
                    
               
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
                                                        <a href="#" class="action quickview"  data-link-action="quickview" title="Quick view" data-id="{{$item->id}}" id="quickview" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                            class="icon-size-fullscreen"></i></a>
                                                
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
                @else
                <div class="empty-text-contant text-center">
                    <i class="icon-handbag"></i>
                    <h1>Product is available</h1>
                    <a class="empty-cart-btn" href="{{route('index')}}">
                        <i class="ion-ios-arrow-left"> </i> Continue shopping
                    </a>
                </div>
                @endif
                
                
                        
                    </div>
                    <!--  Pagination Area Start -->
                    <div class="pro-pagination-style text-center mb-md-30px mb-lm-30px mt-6" data-aos="fade-up">
                        <ul>
                            <li>
                                <a class="prev" href="#"><i class="ion-ios-arrow-left"></i></a>
                            </li>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li>
                                <a class="next" href="#"><i class="ion-ios-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!--  Pagination Area End -->
                </div>
                <!-- Shop Bottom Area End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
                <div class="shop-sidebar-wrap">
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget">
                        <div class="main-heading">
                            <h3 class="sidebar-title">Category</h3>
                        </div>
                        <div class="sidebar-widget-category">
                            <ul>
                                <li><a href="{{route('allproduct')}}" class="selected">All <span>({{Count($category)}})</span> </a></li>
                                @foreach ($category as $item)
                                    
                                
                                <li><a href="{{route('category',$item->id)}}" class="">{{$item->nameCategory}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar single item -->
                    <div class="sidebar-widget-group">
                        <h3 class="sidebar-title">Filter By</h3>
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Price</h4>
                            <div class="price-filter">
                                <div class="price-slider-amount">
                                    <input type="text" id="amount" class="p-0 h-auto lh-1" name="price" placeholder="Add Your Price">
                                </div>
                                <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                      
                    </div>
                    <!-- Sidebar single item -->
                    
                    <!-- Sidebar single item -->
                </div>
            </div>
        </div>
    </div>
</div>
  
<script>
    $(document).ready(function(){
      $('.add-to-cart').click(function(){
          swal("Here's the title!", "...and here's the text!");
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