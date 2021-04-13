@extends('User.layout')
@section('body')
<div class="cart-main-area pt-100px pb-100px">
    <div class="container">
        <h3 class="cart-page-title" id="item">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                @if (Cart::count()>0)
                <div class="table-content table-responsive cart-table-content" id="classcart">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Until Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $row)
                                
                           <form>
                            @csrf
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="#"><img class="img-responsive ml-3" src="{{asset('public/image_product/'.$row->options->image)}}" alt=""></a>
                                </td>
                                <input type="hidden"  value="{{$row->rowId}}" class="cart_product_id_{{$row->id}}">
                                <td class="product-name"><a href="#">{{$row->name}}</a></td>
                                <td class="product-price-cart"><span class="amount">${{ number_format($row->price)}}</span></td>
                                <td class="product-quantity">
                                    <div class="cart-plus-minus"><div class="dec qtybutton">-</div>
                                        <input class="cart-plus-minus-box" id="quantity_{{$row->rowId}}" type="text" value="{{$row->qty}}" name="qtybutton" value="1">
                                    <div class="inc qtybutton">+</div></div>
                                </td>
                                <td class="product-subtotal" >${{ number_format($row->qty * $row->price)}}</td>
                                <td class="product-remove">
                                    <button type="button" class="icon-pencil"  data-id="{{$row->rowId}}"></button>
                                    <button type="button" class="icon-close"  data-id="{{$row->rowId}}"></button>
                                   
                                    
                                </td>
                            </tr>
                        </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                        
               
                    
                    <div class="row" id="classcart1">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update sub-total">
                                    @php
                                    $total = 0;
                                    if(Cart::count() > 0){
                                        foreach (Cart::content() as $row){
                                            $total += $row->qty*$row->price;
                                        }
                                    }
                                @endphp
                                    <h3 class="text-right theme-color" style="font-family: sans-serif; color: #ff7004" id="spancart">Total :${{$total}}</h3>
                                   
                                </div>
                                <div class="cart-clear">
                                    <button>Update Shopping Cart</button>
                                    
                                    <button class="btn-hove cart-clear" id="next">CHECKOUT</button>
                                </div>
                            </div>
                        </div>
                    </div>
               
                    @else
                    <div class="empty-text-contant text-center">
                    <i class="icon-handbag"></i>
                    <h1>There are no more items in your cart</h1>
                    <a class="empty-cart-btn" href="{{route('index')}}">
                        <i class="ion-ios-arrow-left"> </i> Continue shopping
                    </a>
                </div>
              
            @endif
                <div class="row" id="checkout">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <form >
                              @csrf
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                      
                                        <label>Full Name</label></br>
                                        <span style="color: red;" id="error1"></span> 
                                        <input type="text" id="fullname">
                                      
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                      
                                        <label>Adress</label></br>
                                        <span  style="color: red;" id="error2"></span> 
                                        <input type="text" id="address">
                                      
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                      
                                        <label>Phone</label></br>
                                        <span  style="color: red;" id="error3"></span>
                                        <input type="number" id="phone">
                                      
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                       
                                        <label>Email</label></br>
                                        <span style="color: red;" id="error4"></span>
                                        <input type="text" id="email">
                                      
                                    </div>
                                </div>
                               
                               
                                
                                
                               
                               
                            </div>
                           
                           
                            <button class="btn-hove" type="button" style="background-color: #ff7004;
                            color: #fff;
                            display: block;
                            font-weight: 700;
                            letter-spacing: 1px;
                            line-height: 1;
                            padding: 18px 20px;
                            text-align: center;
                            text-transform: uppercase;
                            border-radius: 0px;
                            z-index: 9;" id="prev">PREVIOUS</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-product-info">
                                    <div class="your-order-top">
                                        <ul>
                                            <li>Product</li>
                                            <li>Total</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            @foreach (Cart::content() as $row)
                                                
                                      
                                            <li><span class="order-middle-left">{{$row->name}}</span> <span class="order-price">${{ number_format($row->total)}} </span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Shipping</li>
                                            <li>Free shipping</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-total">
                                        <ul>
                                            <li class="order-total">Total</li>
                                            @php
                                            $total = 0;
                                            if(Cart::count() > 0){
                                                foreach (Cart::content() as $row){
                                                    $total += $row->qty*$row->price;
                                                }
                                            }
                                        @endphp
                                            <li style="font-family: sans-serif; color:#ff7004">${{$total}}</li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="Place-order mt-25">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col"> <div class="payment__item"id="paypal-button"></div></th>
                                        <th scope="col"> 
                                            <a href="http://localhost/BronzeLakeShop/Orders/2" id="cod" style="background-color: #ff7004;
                                            color: #fff;
                                            display: block;
                                            font-weight: 700;
                                            letter-spacing: 1px;
                                            line-height: 1;
                                            padding: 18px 20px;
                                            text-align: center;
                                            text-transform: uppercase;
                                            border-radius: 0px;
                                            z-index: 9;">PAYMENT COD</a></th>
                                    
                                      </tr>
                                    
                                  </table>
                           
                           
                           
                            </br>
                                <a id="order" class="btn-hover"  >Place Order</a>
                               
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $check = "";
    if(Session::get('name_user')!=null){
        $check = session::get('name_user');
    }
@endphp
<input type="hidden" name="username" id="username" value="{{$check}}">
<input id="totall" type="hidden" value="{{Cart::total()}}">
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  
  var total = $('#totall').val();
  var a= total.split('.00');
  var b = (a[0]);
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'ATHbVb2jTzahVRgpWdYfeBgakNNAHliW2Swn0Yc5AV8ehf8UaDcFcBUihEAEQJW_ITVJHL7JrDu08DlW',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${b}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
       window.location.href = 'http://localhost/BronzeLakeShop/Orders/1';
       
      });
    }
  }, '#paypal-button');

</script>
<script>
 $('#checkout').hide();
 $('#paypal-button').hide();
 $('#cod').hide();
 
</script>
<script>
    $(document).ready(function(){
      
   
    $('#order').click(function(){
        var name = $('#fullname').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var email = $('#email').val();
        var _token = $('input[name="_token"]').val();
        if(name == ""){
            $('#error1').text('Please Enter Name');
           return;
        }
        if(address == ""){
            $('#error2').text('Please Enter Address');
            return;
        }
        if(phone == ""){
            $('#error3').text('Please Enter Phone');
            return;
        }
        if(email == ""){
            $('#error4').text('Please Enter Email');
            return;
        }
        var url="{{route('SessionCart')}}";  
        $.ajax({
                    url:url,
                    method: 'POST',
                    data:{
                        name:name,
                        email:email,
                        address:address,
                        phone:phone,
                        _token:_token
                        },
                    success:function(s){
                        $('#paypal-button').show();
                        $('#cod').show();
                        $('#order').hide();
                    }

                });
    });
        $('#next').click(function(){
            var user = $('#username').val();
            if(user==""){
                window.location.href = 'http://localhost/BronzeLakeShop/login';
            }else{

            $('#classcart').hide();
            $('#classcart1').hide();
            $('#item').hide()
            $('#checkout').show();
            }
         
        });
        $('#prev').click(function(){
            $('#classcart').show();
            $('#classcart1').show();
            $('#item').hide()
            $('#checkout').hide();
        });

        $('.icon-pencil').click(function(){
            
            var id = $(this).data('id');   
            var cart_product_quantity = $('#quantity_'+id).val();
            var _token = $('input[name="_token"]').val();
            var url="{{route('updateCart')}}";  
            
            var url1="{{route('loadCart')}}";  
            $.ajax({
                    url:url,
                    method: 'POST',
                    data:{
                        id:id,
                        cart_product_quantity:cart_product_quantity,
                        _token:_token
                        },
                    success:function(s){
                        $('.inner').html(s);
                        
                        
                        location.reload();
                 
                           

                    }

                });
      });
      $('.icon-close').click(function(){
        
        var id = $(this).data('id');   
       
        var _token = $('input[name="_token"]').val();
        var url="{{route('deleteItemCart')}}";  

        $.ajax({
                url:url,
                method: 'POST',
                data:{
                    id:id,
                    _token:_token
                    },
                success:function(s){
                    $('.inner').html(s);
                   
                    location.reload();

                }

            });
    });
  
    
});


</script>
@endsection