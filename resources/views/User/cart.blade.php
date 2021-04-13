<div class="inner">
    <div class="head">
        <span class="title">Cart</span>
        <button class="offcanvas-close">×</button>
    </div>
    <div class="body customScroll">
        <ul class="minicart-product-list">
            @foreach (Cart::content() as $row)
                            
            <li>
                <a href="single-product.html" class="image"><img src="{{asset('public/image_product/'.$row->options->image)}}" alt="Cart product Image"></a>
                <div class="content">
                    <a href="single-product.html" class="title">{{$row->name}}</a>
                    <span class="quantity-price">{{$row->qty}} x <span class="amount">${{ number_format($row->price)}}</span></span>
                    <a href="#" class="remove">×</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="foot">
        <div class="sub-total">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="text-left">Total :</td>
                        @php
                        $total = 0;
                        if(Cart::count() > 0){
                            foreach (Cart::content() as $row){
                                $total += $row->qty*$row->price;
                            }
                        }
                    @endphp
                        <td class="text-right theme-color">${{$total}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="buttons">
            <a href="{{route('cart')}}" class="btn btn-dark btn-hover-primary mb-6">view cart</a>
        
        </div>
        <p class="minicart-message">Free Shipping on All Orders Over $100!</p>
    </div>
    
</div>
