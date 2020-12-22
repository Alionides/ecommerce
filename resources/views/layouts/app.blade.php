
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Anil z" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
<meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- SITE TITLE -->
<title>Alisveris.com</title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="/assets/css/animate.css">	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet"> 
<!-- Icon Font CSS -->
<link rel="stylesheet" href="/assets/css/all.min.css">
<link rel="stylesheet" href="/assets/css/ionicons.min.css">
<link rel="stylesheet" href="/assets/css/themify-icons.css">
<link rel="stylesheet" href="/assets/css/linearicons.css">
<link rel="stylesheet" href="/assets/css/flaticon.css">
<link rel="stylesheet" href="/assets/css/simple-line-icons.css">
<link rel="stylesheet" href="/assets/fontawesome/css/all.css">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="/assets/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="/assets/owlcarousel/css/owl.theme.css">
<link rel="stylesheet" href="/assets/owlcarousel/css/owl.theme.default.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="/assets/css/magnific-popup.css">
<!-- jquery-ui CSS -->
<link rel="stylesheet" href="/assets/css/jquery-ui.css">
<!-- Slick CSS -->
<link rel="stylesheet" href="/assets/css/slick.css">
<link rel="stylesheet" href="/assets/css/slick-theme.css">
<!-- Style CSS -->
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/responsive.css">
@yield('css')
</head>
<body>
@php
    use Carbon\Carbon;
    $ln = App::getLocale();
    $title = 'title_'.$ln;
@endphp
<!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<span class="baseurl" data-url="/{{ Config('app.locale') }}"></span>
<!-- END LOADER -->

<!-- Home Popup Section -->
{{-- <div class="modal fade subscribe_popup" id="onload-popup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row no-gutters">
                    <div class="col-sm-7">
                        <div class="popup_content text-left">
                            <div class="popup-text">
                                <div class="heading_s1">
                                    <h3>Subscribe Newsletter and Get 25% Discount!</h3>
                                </div>
                                <p>Subscribe to the newsletter to receive updates about new products.</p>
                            </div>
                            <form method="post">
                            	<div class="form-group">
                                	<input name="email" required type="email" class="form-control" placeholder="Enter Your Email">
                                </div>
                                <div class="form-group">
                                	<button class="btn btn-fill-out btn-block text-uppercase" title="Subscribe" type="submit">Subscribe</button>
                                </div>
                            </form>
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                    <label class="form-check-label" for="exampleCheckbox3"><span>Don't show this popup again!</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                    	<div class="background_bg h-100" data-img-src="/assets/images/popup_img3.jpg"></div>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div> --}}
<!-- End Screen Load Popup Section --> 

<!-- START HEADER -->
<header class="header_wrap1">
	{{-- <div class="top-header light_skin bg_dark d-none d-md-block">
        <div class="custom-container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">
                	<div class="header_topbar_info">
                    	<div class="header_offer">
                    		<span>Free Ground Shipping Over $250</span>
                        </div>
                        <div class="download_wrap">
                            <span class="mr-3">Download App</span>
                            <ul class="icon_list text-center text-lg-left">
                                <li><a href="#"><i class="fab fa-apple"></i></a></li>
                                <li><a href="#"><i class="fab fa-android"></i></a></li>
                                <li><a href="#"><i class="fab fa-windows"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="lng_dropdown">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="/assets/images/eng.png" data-title="English">English</option>
                                <option value='fn' data-image="/assets/images/fn.png" data-title="France">France</option>
                                <option value='us' data-image="/assets/images/us.png" data-title="United States">United States</option>
                            </select>
                        </div>
                        <div class="ml-3">
                            <select name="countries" class="custome_select">
                                <option value='USD' data-title="USD">USD</option>
                                <option value='EUR' data-title="EUR">EUR</option>
                                <option value='GBR' data-title="GBR">GBR</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="top-header">
        <div class="custom-container">
            <div class="row align-items-center">
                <div class="col-md-6">
                	{{-- <div class="text-center text-md-left">
                       	<ul class="header_list">
                        	<li><a href="compare.html"><i class="ti-control-shuffle"></i><span>Compare</span></a></li>
                            <li><a href="wishlist.html"><i class="ti-heart"></i><span>Wishlist</span></a></li>
                            <li><a href="login.html"><i class="ti-user"></i><span>Login</span></a></li>
						</ul>
                    </div> --}}
                </div>
                <div class="col-md-6">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="lng_dropdown mr-2">
                            <select name="countries" class="langs custome_select">
                                <option value='az' data-image="/assets/images/az.png" data-title="az" {{ App::getLocale() == 'az' ? 'selected' : ''}}>AZ</option>                                
                                <option value='tr' data-image="/assets/images/tr.png" data-title="tr" {{ App::getLocale() == 'tr' ? 'selected' : ''}}>TR</option>
                                <option value='en' data-image="/assets/images/eng.png" data-title="en" {{ App::getLocale() == 'en' ? 'selected' : ''}}>EN</option>
                                <option value='ru' data-image="/assets/images/ru.png" data-title="ru" {{ App::getLocale() == 'ru' ? 'selected' : ''}}>RU</option>
                            </select>
                        </div>
                        <div class="mr-3">
                            <select name="countries" class="custome_select">
                                <option value='AZN' data-title="AZN">AZN</option>
                                <option value='USD' data-title="USD">TL</option>
                                <option value='EUR' data-title="EUR">USD</option>
                                <option value='GBR' data-title="GBR">RUBL</option>
                            </select>
                        </div>
                        <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-mobile"></i><span>*4433</span></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    <div class="middle-header dark_skin">
    	<div class="custom-container">
        	<div class="nav_block">
                <a class="navbar-brand" href="/">
                    <img class="logo_light" src="/assets/images/logo_light.png" alt="logo" />
                    <img class="logo_dark" src="/assets/images/logo_dark_alisveris1.png" alt="logo" />
                </a>
                <div class="product_search_form rounded_input">
                    <form>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="custom_select">
                                    <select class="first_null">
                                        <option value="">{{__('lang.category')}}</option>
                                        <option value="Dresses">Dresses</option>
                                        <option value="Shirt-Tops">Shirt & Tops</option>
                                        <option value="T-Shirt">T-Shirt</option>
                                        <option value="Pents">Pents</option>
                                        <option value="Jeans">Jeans</option>
                                    </select>
                                </div>
                            </div>
                            <input class="form-control" placeholder="{{__('lang.search')}}" required=""  type="text">
                            <button type="submit" class="search_btn2"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-secondary btn-xs dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="linearicons-user"></i>{{__('lang.myaccount')}}
                        </button>
                        @auth
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">{{ Auth::user()->email }}</a>
                          <a class="dropdown-item" href="{{ route('profile')}}">Profile</a>
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                           </form>
                        </div>
                        @else
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('register') }}">Qeydiyyat</a>
                            <a class="dropdown-item" href="{{ route('login') }}">Giris</a>                            
                          </div>
                        @endif
                    </div>       
                    <li><a href="#" class="nav-link"><i class="linearicons-heart"></i><span class="wishlist_count">{{count($allfavo)}}</span></a></li>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-bag2"></i><span class="cart_count">{{count($allcart)}}</span><span class="amount"><!--<span class="currency_symbol">$</span>159.00--></span></a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                @php
                                    $totalcartprice = 0;
                                @endphp
                                @foreach ($allcart as $c)
                                    @foreach ($c->products as $ca)
                                    <li>
                                        @php
                                            $ca->saleprice > 0 ? $price = $ca->saleprice : $price = $ca->price;
                                            $totalcartprice += $c->quantity*$price;
                                        @endphp
                                        <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                        <a href="#"><img src="/storage/{{$ca->image}}" alt="cart_thumb1">{{$ca->$title}}</a>
                                        <span class="cart_quantity"> {{$c->quantity}} x <span class="cart_amount">{{$price}} <span class="price_symbole">Azn</span></span></span>
                                    </li>   
                                    @endforeach   
                                @endforeach                           
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>{{__('lang.subtotal')}}:</strong> <span class="cart_price"> {{$totalcartprice}} </span> <span class="price_symbole"> Azn</span></p>
                                <p class="cart_buttons"><a href="/{{ Config('app.locale') }}/cart" class="btn btn-fill-line view-cart">{{__('lang.viewcart')}}</a><a href="/{{ Config('app.locale') }}/checkout" class="btn btn-fill-out checkout">{{__('lang.checkout')}}</a></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <section class="circleslider slider container1">
        @foreach ($shop as $s)
        <div class="text-center">
          <img class="circlesliderimg" src="{{Voyager::image($s->image)}}">
          <div> <a href="/{{ Config('app.locale') }}/shop/{{$s->slug}}"> <p class="circleslidertitle">{{$s->name}}</p></a></div>
        </div>
        @endforeach
        
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/nike__brand__1479.png">
          <div><p class="circleslidertitle">Nike</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/adidas__brand__15.png">
          <div><p class="circleslidertitle">Adidas</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/trendyolmilla__brand__40.png">
          <div><p class="circleslidertitle">Trendol Milla</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/happiness__brand__8727.png">
          <div><p class="circleslidertitle">Happiness</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/nike__brand__1479.png">
          <div><p class="circleslidertitle">Nike</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/adidas__brand__15.png">
          <div><p class="circleslidertitle">Adidas</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/trendyolmilla__brand__40.png">
          <div><p class="circleslidertitle">Trendol Milla</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/koton__brand__842.png">
          <div><p class="circleslidertitle">Cotton</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/nike__brand__1479.png">
          <div><p class="circleslidertitle">Nike</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/adidas__brand__15.png">
          <div><p class="circleslidertitle">Adidas</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/trendyolmilla__brand__40.png">
          <div><p class="circleslidertitle">Trendol Milla</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/adidas__brand__15.png">
          <div><p class="circleslidertitle">Adidas</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/trendyolmilla__brand__40.png">
          <div><p class="circleslidertitle">Trendol Milla</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/adidas__brand__15.png">
          <div><p class="circleslidertitle">Adidas</p></div>
        </div>
        <div class="text-center">
          <img class="circlesliderimg" src="https://cdn.dsmcdn.com/assets/t/y/Creative/ds/Automation/SquareLogosIteration3/trendyolmilla__brand__40.png">
          <div><p class="circleslidertitle">Trendol Milla</p></div>
        </div>
        
      </section>
</header>

@yield('content')

<!-- START FOOTER -->
<footer class="bg_gray">
	<div class="footer_top small_pt pb_20">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                	<div class="widget">
                        <div class="footer_logo">
                            <a href="#"><img src="/assets/images/logo_dark_alisveris1.png" alt="logo"/></a>
                        </div>
                        <p class="mb-3">If you are going to use of Lorem Ipsum need to be sure there isn't anything hidden of text</p>
                        <ul class="contact_info">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p>{{__('lang.addresstxt')}}</p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:info@sitename.com">info@sitename.com</a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>+ 457 789 789 65</p>
                            </li>
                        </ul>
                    </div>
        		</div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">{{__('lang.links')}}</h6>
                        <ul class="widget_links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Location</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">{{__('lang.myaccount')}}</h6>
                        <ul class="widget_links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Discount</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Orders History</a></li>
                            <li><a href="#">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                	<div class="widget">
                        <h6 class="widget_title">Instagram</h6>
                        <ul class="widget_instafeed instafeed_col4">
                            <li><a href="#"><img src="/assets/images/insta_img1.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="/assets/images/insta_img2.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="/assets/images/insta_img3.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="/assets/images/insta_img4.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="/assets/images/insta_img5.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="/assets/images/insta_img6.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="/assets/images/insta_img7.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                            <li><a href="#"><img src="/assets/images/insta_img8.jpg" alt="insta_img"><span class="insta_icon"><i class="ti-instagram"></i></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle_footer">
    	<div class="custom-container">
        	<div class="row">
            	<div class="col-12">
                	<div class="shopping_info">
                        <div class="row justify-content-center">
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-shipped"></i>
                                    </div>
                                    <div class="icon_box_content">
                                    	<h5>{{__('lang.freedelivery')}}</h5>
                                        <p>Phasellus blandit massa enim elit of passage varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-money-back"></i>
                                    </div>
                                    <div class="icon_box_content">
                                    	<h5>{{__('lang.returngaranty')}}</h5>
                                        <p>Phasellus blandit massa enim elit of passage varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-support"></i>
                                    </div>
                                    <div class="icon_box_content">
                                    	<h5>{{__('lang.support')}}</h5>
                                        <p>Phasellus blandit massa enim elit of passage varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4">
                    <p class="mb-lg-0 text-center">© 2020 {{__('lang.copyright')}}</p>
                </div>
                <div class="col-lg-4 order-lg-first">
                    <div class="widget mb-lg-0">
                        <ul class="social_icons text-center text-lg-left">
                            <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ul class="footer_payment text-center text-lg-right">
                        <li><a href="#"><img src="/assets/images/visa.png" alt="visa"></a></li>
                        <li><a href="#"><img src="/assets/images/discover.png" alt="discover"></a></li>
                        <li><a href="#"><img src="/assets/images/master_card.png" alt="master_card"></a></li>
                        <li><a href="#"><img src="/assets/images/paypal.png" alt="paypal"></a></li>
                        <li><a href="#"><img src="/assets/images/amarican_express.png" alt="amarican_express"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<script src="/assets/js/jquery-1.12.4.min.js"></script> 
<!-- jquery-ui --> 
<script src="/assets/js/jquery-ui.js"></script>
<!-- popper min js -->
<script src="/assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="/assets/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="/assets/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="/assets/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="/assets/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="/assets/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="/assets/js/jquery.countdown.min.js"></script> 
<!-- imagesloaded js --> 
<script src="/assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js --> 
<script src="/assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="/assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="/assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="/assets/js/jquery.elevatezoom.js"></script>
<!-- sweetalert js -->
<script src="/assets/js/sweetalert2.js"></script>
<!-- scripts js --> 
<script src="/assets/js/scripts.js"></script>
@yield('js')
</body>
</html>