<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>HKT STORE</title>
    <meta name="description" content="240+ Best Bootstrap Templates are available on this website. Find your template for your project compatible with the most popular HTML library in the world." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="https://htmldemo.hasthemes.com/furns/" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Furns - Responsive eCommerce HTML Template" />
    <meta property="og:url" content="PAGE_URL" />
    <meta property="og:site_name" content="Furns - Responsive eCommerce HTML Template" />
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#" />
    <meta property="og:description" content="Furns - Responsive eCommerce HTML Template" />
    <meta name="robots" content="noindex, follow" />
    <!-- Add site Favicon -->
    <link rel="icon" href="{{asset('public/User/assets/images/favicon/favicon.png')}}" sizes="32x32" />
    <link rel="icon" href="{{asset('public/User/assets/images/favicon/favicon.png')}}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{asset('public/User/assets/images/favicon/favicon.png')}}" />
    <meta name="msapplication-TileImage" content="{{asset('public/User/assets/images/favicon/favicon.png')}}" />
    
    <!-- Structured Data  -->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "name": "Replace_with_your_site_title",
            "url": "Replace_with_your_site_URL"
        }
    </script>

    <!-- vendor css (Bootstrap & Icon Font) -->
     <link rel="stylesheet" href="{{asset('public/User/assets/css/vendor/simple-line-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('public/User/assets/css/vendor/ionicons.min.css')}}" /> 

    <!-- plugins css (All Plugins Files) -->
     <link rel="stylesheet" href="{{asset('public/User/assets/css/plugins/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('public/User/assets/css/plugins/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/User/assets/css/plugins/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/User/assets/css/plugins/jquery.lineProgressbar.css')}}">
    <link rel="stylesheet" href="{{asset('public/User/assets/css/plugins/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('public/User/assets/css/plugins/venobox.css')}}" /> 

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="{{asset('public/User/assets/css/vendor/vendor.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/User/assets/css/plugins/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/User/assets/css/style.min.css')}}">

    <!-- Main Style -->
     <link rel="stylesheet" href="{{asset('public/User/assets/css/style.css')}}" /> 

</head>

<body>
    <!-- Header Area start  -->
    <div class="header section">
        <!-- Header Top Message Start -->
        
        <!-- Header Top  End -->
        
		








		
        <div class="header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row align-self-center">
                    <!-- Header Logo Start -->
                    <div class="col-auto align-self-center">
                        <div class="header-logo">
                            <a href="{{route('index')}}"><img src="{{asset('public/User/assets/images/logo/logo.png')}}" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Action Start -->
                    <div class="col align-self-center">
                        <div class="header-actions">
                            <div class="header_account_list">
                                <a href="javascript:void(0)" class="header-action-btn search-btn"><i
                                        class="icon-magnifier"></i></a>
                                <div class="dropdown_search">
                                    <form >
                                        @csrf
                                        <input class="form-control" id="inputSearch" placeholder="Enter your search key" type="text">
                                        <button style="position: absolute;
                                        top: 0;
                                        left: auto;
                                        right: 0;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        width: 60px;
                                        height: 100%;
                                        background: #ff7004;
                                        color: #fff;
                                        font-size: 20px;
                                        border-radius: 0px 5px 5px 0px;
                                        box-shadow: none;
                                        outline: 0;" type="button" id="btnsearch"><i class="icon-magnifier"></i></button>
                                        
                                        
                                    </form>
                                </div>
                            </div>
                            <!-- Single Wedge Start -->
                            @if (Auth::check()) 
                           
                                <div class="header-bottom-set dropdown">
                                    <a href="{{route('profile')}}" class="dropdown-toggle header-action-btn" ><i class="icon-user"></i></a>
                                   
                                </div>
                          
                                
                            @else
                            <div class="header-bottom-set dropdown">
                                <a href="{{route('login-user')}}" class="dropdown-toggle header-action-btn" ><i class="icon-user"></i></a>
                               
                            </div>
                         
                            @endif

                            
                            {{-- <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart  pr-0 icon-cartt">
                                <i class="icon-heart"></i>
                               
                                    
                                <span  class="header-action-num quochuy">20</span>'
                               
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a> --}}
                            <!-- Single Wedge End -->
                            <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0 icon-cartt">
                                <i class="icon-handbag "></i>
                               
                                    @php
                                    $qty =  Cart::count();
                                     echo ' <span data-qty="'.$qty.'" class="header-action-num quochuy">'.$qty.'</span>';
                                @endphp
                               
                               
                               
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a>
                            
                            <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="icon-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>
        <!-- Header Bottom  End -->
        <!-- Header Bottom  Start -->
        <div class="header-bottom d-lg-none sticky-nav bg-white">
            <div class="container position-relative">
                <div class="row align-self-center">
                    <!-- Header Logo Start -->
                    <div class="col-auto align-self-center">
                        <div class="header-logo">
                            <a href="index.html"><img src="{{asset('public/User/assets/images/logo/logo.png')}}" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Action Start -->
                    <div class="col align-self-center">
                        <div class="header-actions">
                            <div class="header_account_list">
                                <a href="javascript:void(0)" class="header-action-btn search-btn"><i
                                        class="icon-magnifier"></i></a>
                                <div class="dropdown_search">
                                    <form class="action-form" action="#">
                                        <input class="form-control" placeholder="Enter your search key" type="text">
                                        <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- Single Wedge Start -->
                            <div class="header-bottom-set dropdown">
                                <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown"><i class="icon-user"></i></button>
                                
                            </div>
                            <!-- Single Wedge End -->
                            <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                <i class="icon-handbag"></i>
                                <span class="header-action-num">01</span>
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a>
                            <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="icon-menu"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Header Action End -->
                </div>
            </div>
        </div>
        <!-- Header Bottom  End -->
        <!-- Main Menu Start -->
        <div class="bg-gray d-none d-lg-block sticky-nav">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <div class="main-menu manu-color-white">
                            <ul>
                                <li><a href="{{route('index')}}"><span class="menu-text">Home</span></a>
                                </li>
                                
                                <li class="dropdown position-static"><a href="{{route('allproduct')}}">Shop <i
                                            class="ion-ios-arrow-down"></i></a>
                                    <ul class="mega-menu d-block">
                                        <li class="d-flex">
                                            <ul class="d-block">
                                                
                                            </ul>
                                            <ul class="d-block">
                                                <li class="title"><a href="#">Brand</a></li>
                                               
                                                
                                                    @foreach ($showBrand as $item)
                                                        
                                                    
                                                    <li><a href="{{route('brand',$item->id)}}">{{$item->brandName}}</a></li>
                                                    @endforeach
                                             
                                            </ul>
                                            <ul class="d-block">
                                                <li class="title"><a href="#">Category</a></li>
                                                {{-- @foreach ($showCate as $item)
                                                        
                                                    
                                                <li><a href="{{route('brand',$item->id)}}">{{$item->nameCategory}}</a></li>
                                                @endforeach --}}
                                            </ul>
                                            
                                            
                                        </li>
                                       
                                    </ul>
                                </li>
                                <li class="dropdown "><a href="{{route('cart')}}">Cart </a>
                               
                                    @if (Auth::check()) 
                           
                                
                                   
                                    <li><a href="{{route('profile')}}">Profile</a></li>
                              
                          
                                
                            @else
                           
                         
                            @endif
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Menu End -->
    </div>
    <!-- Header Area End  -->

    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart" id="reloadcart">
        <div class="inner">
            <div class="head">
                <span class="title">Cart</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    @if(Cart::count() > 0)
                    @foreach (Cart::content() as $row)
                                    
                    <li>
                        <a href="single-product.html" class="image"><img src="{{asset('public/image_product/'.$row->options->image)}}" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">{{$row->name}}</a>
                            <span class="quantity-price">{{$row->qty}} x <span class="amount">${{ ($row->price)}}</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    @endforeach
                    @endif
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
                                <td class="text-right theme-color" id="totalcart" >${{$total}}</td>
                          
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
    </div>
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart" id="whistlist1">
        <div class="inner">
            <div class="head">
                <span class="title">Cart</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    @if(Cart::count() > 0)
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
                    @endif
                </ul>
            </div>
            <div class="foot">
                <div class="sub-total">
                    <table class="table">
                        <tbody>
                           
                            <tr>
                                <td class="text-left">Total :</td>
                                <td class="text-right theme-color" id="totalcart" >${{Cart::total()}}</td>
                          
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
    </div>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <button class="offcanvas-close"></button>
        <div class="inner customScroll">

            <div class="offcanvas-menu mb-4">
                <ul>
                    <li><a href="{{route('index')}}"><span class="menu-text">Home</span></a>
                       
                    </li>
                    <li><a href="about.html">About Us</a></li>
                  
                        <ul class="sub-menu">
                            <li>
                                <a href="#"><span class="menu-text">Brand</span></a>
                                <ul class="sub-menu">
                                    @foreach ($showBrand as $item)
                                                        
                                                    
                                                    <li><a href="shop-3-column.html">{{$item->brandName}}</a></li>
                                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text">product Details Page</span></a>
                                <ul class="sub-menu">
                                    <li><a href="single-product.html">Product Single</a></li>
                                    <li><a href="single-product-variable.html">Product Variable</a></li>
                                    <li><a href="single-product-affiliate.html">Product Affiliate</a></li>
                                    <li><a href="single-product-group.html">Product Group</a></li>
                                    <li><a href="single-product-tabstyle-2.html">Product Tab 2</a></li>
                                    <li><a href="single-product-tabstyle-3.html">Product Tab 3</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text">Single Product Page</span></a>
                                <ul class="sub-menu">
                                    <li><a href="single-product-slider.html">Product Slider</a></li>
                                    <li><a href="single-product-gallery-left.html">Product Gallery Left</a>
                                    </li>
                                    <li><a href="single-product-gallery-right.html">Product Gallery Right</a>
                                    </li>
                                    <li><a href="single-product-sticky-left.html">Product Sticky Left</a></li>
                                    <li><a href="single-product-sticky-right.html">Product Sticky Right</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text">Other Pages</span></a>
                                <ul class="sub-menu">
                                    <li><a href="cart.html">Cart Page</a></li>
                                    <li><a href="checkout.html">Checkout Page</a></li>
                                    <li><a href="compare.html">Compare Page</a></li>
                                    <li><a href="wishlist.html">Wishlist Page</a></li>
                                    <li><a href="my-account.html">Account Page</a></li>
                                    <li><a href="login.html">Login & Register Page</a></li>
                                    <li><a href="empty-cart.html">Empty Cart Page</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="menu-text">Pages</span></a>
                        <ul class="sub-menu">
                            <li><a href="404.html">404 Page</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="faq.html">Faq Page</a></li>
                            <li><a href="coming-soon.html">Coming Soon Page</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="menu-text">Blog</span></a>
                        <ul class="sub-menu">
                            <li><a href="#"><span class="menu-text">Blog Grid</span></a>
                                <ul class="sub-menu">
                                    <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                    <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span class="menu-text">Blog List</span></a>
                                <ul class="sub-menu">
                                    <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                                    <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span class="menu-text">Blog Single</span></a>
                                <ul class="sub-menu">
                                    <li><a href="blog-single-left-sidebar.html">Blog Single Left Sidebar</a></li>
                                    <li><a href="blog-single-right-sidebar.html">Blog Single Right Sidbar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div>
            <!-- OffCanvas Menu End -->

            <!-- Language Currency start -->
            <div class="offcanvas-userpanel mt-8">
                <ul>
                    <!-- Language Start -->
                    <li class="offcanvas-userpanel__role">
                        <a href="#">English <i class="ion-ios-arrow-down"></i></a>
                        <ul class="user-sub-menu">
                            <li><a class="current" href="#">English</a></li>
                            <li><a href="#"> Italiano</a></li>
                            <li><a href="#"> Français</a></li>
                            <li><a href="#"> Filipino</a></li>
                        </ul>
                    </li>
                    <!-- Language End -->
                    <!-- Currency Start -->
                    <li class="offcanvas-userpanel__role">
                        <a href="#">USD $ <i class="ion-ios-arrow-down"></i></a>
                        <ul class="user-sub-menu">
                            <li><a class="current" href="#">USD $</a></li>
                            <li><a href="#">EUR €</a></li>
                            <li><a href="#">POUND £</a></li>
                            <li><a href="#">FRANC ₣</a></li>
                        </ul>
                    </li>
                    <!-- Currency End -->
                </ul>
            </div>
            <!-- Language Currency End -->
            <div class="offcanvas-social mt-auto">
                <ul>
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
                        <a href="#"><i class="ion-social-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ion-social-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- OffCanvas Menu End -->


    <div class="offcanvas-overlay"></div>
	@yield('body')

    <!-- Footer Area Start -->
    <div class="footer-area">
        <div class="footer-container">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <!-- Start single blog -->
                        <div class="col-md-6 col-lg-4 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="200">
                            <div class="single-wedge">
                                <h4 class="footer-herading">about us</h4>
                                <p class="about-text">Lorem ipsum dolor sit amet cons adipisicing elit sed do eiusm tempor incididunt ut labor et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                </p>
                                <ul class="link-follow">
                                    <li class="li">
                                        <a class="paypal icon-paypal m-0" title="Paypal" href="#"></a>
                                    </li>
                                    <li class="li">
                                        <a class="tumblr icon-social-tumblr" title="Tumblr" href="#"></a>
                                    </li>
                                    <li class="li">
                                        <a class="twitter icon-social-twitter" title="Twitter" href="#"></a>
                                    </li>
                                    <li class="li">
                                        <a class="pinterest icon-social-pinterest" title="Pinterest" href="#"></a>
                                    </li>
                                    <li class="li">
                                        <a class="linkedin icon-social-linkedin" title="Linkedin" href="#"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-6 col-sm-6 col-lg-3 mb-md-30px mb-lm-30px" data-aos="fade-up" data-aos-delay="400">
                            <div class="single-wedge">
                                <h4 class="footer-herading">information</h4>
                                <div class="footer-links">
                                    <div class="footer-row">
                                        <ul class="align-items-center">
                                            <li class="li"><a class="single-link" href="about.html">About us</a></li>
                                            <li class="li"><a class="single-link" href="#">Delivery Information</a></li>
                                            <li class="li"><a class="single-link" href="privacy-policy.html">Privacy & Policy</a></li>
                                            <li class="li"><a class="single-link" href="#">Terms & Condition</a></li>
                                            <li class="li"><a class="single-link" href="#">Manufactures</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-6 col-lg-2 col-sm-6 mb-lm-30px" data-aos="fade-up" data-aos-delay="600">
                            <div class="single-wedge">
                                <h4 class="footer-herading">my account</h4>
                                <div class="footer-links">
                                    <div class="footer-row">
                                        <ul class="align-items-center">
                                            <li class="li"><a class="single-link" href="my-account.html">My
                                                    Account</a>
                                            </li>
                                            <li class="li"><a class="single-link" href="cart.html">My Cart</a></li>
                                            <li class="li"><a class="single-link" href="login.html">Login</a></li>
                                            <li class="li"><a class="single-link" href="wishlist.html">Wishlist</a></li>
                                            <li class="li"><a class="single-link" href="checkout.html">Checkout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="800">
                            <div class="single-wedge">
                                <h4 class="footer-herading">newsletter</h4>
                                <div class="footer-links">
                                    <!-- News letter area -->
                                    <div id="mc_embed_signup" class="subscribe-form">
                                        <form id="mc-embedded-subscribe-form" class="validate" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                            <div id="mc_embed_signup_scroll" class="mc-form">
                                                <input class="email" type="email" required="" placeholder="Your Mail*" name="EMAIL" value="" />
                                                <div class="mc-news" aria-hidden="true">
                                                    <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" />
                                                </div>
                                                <div class="clear">
                                                    <button id="mc-embedded-subscribe" class="button btn-primary" type="submit" name="subscribe" value=""><i
                                                            class="icon-cursor"></i> Send Mail</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- News letter area  End -->
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row flex-sm-row-reverse">
                        <div class="col-md-6 text-right">
                            <div class="payment-link">
                                <img src="{{asset('public/User/assets/images/icons/payment.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 text-left">
                            <p class="copy-text">Copyright © 2021 <a class="company-name" href="https://hasthemes.com/">
                                    HasThemes</a>. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Area End -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">x</span></button>
                </div>
                
            </div>
            
        </div>
    </div>
<script>
$(document).ready(function(){
          
       
     $('#btnsearch').click(function(){
        var key = $('#inputSearch').val();
        window.location.href = "http://localhost/BronzeLakeShop/search/"+key;
    });
            
      
        
});
    
    
</script>
    <!-- Modal -->
  
    <!-- Modal end -->






    <script src="{{asset('public/User/assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('public/User/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('public/User/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/User/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('public/User/assets/js/vendor/modernizr-3.11.2.min.js')}}"></script> 	

    <!--Plugins JS-->
    <script src="{{asset('public/User/assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('public/User/assets/js/plugins/jquery-ui.min.js')}}"></script>
    <script src="{{asset('public/User/assets/js/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('public/User/assets/js/plugins/countdown.js')}}"></script>
    <script src="{{asset('public/User/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('public/User/assets/js/plugins/jquery.waypoints.js')}}"></script>
    <script src="{{asset('public/User/assets/js/plugins/jquery.lineProgressbar.js')}}"></script>
    <script src="{{asset('public/User/assets/js/plugins/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('public/User/assets/js/plugins/venobox.min.js')}}"></script>
    <script src="{{asset('public/User/assets/js/plugins/ajax-mail.js')}}"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="{{asset('public/User/assets/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('public/User/assets/js/plugins/plugins.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css"></script>
    <!-- Main Js -->
    <script src="{{asset('public/User/assets/js/main.js')}}"></script>
  
</body>

</html>