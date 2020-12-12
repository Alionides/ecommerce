@extends('layouts.app')
@section('content')
@php
$ln = App::getLocale();
$title = 'title_'.$ln;
$desc = 'desc_'.$ln;
@endphp

<div class="bottom_header dark_skin main_menu_uppercase border-top border-bottom">
    <div class="custom-container">
        <div class="row"> 
            <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                <div class="categories_wrap">
                    <button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false" class="categories_btn">
                        <i class="linearicons-menu"></i><span>{{__('lang.allcategory')}}</span>
                    </button>
                    <div id="navCatContent" class="nav_cat navbar collapse">
                        <ul> 
                            @foreach($parentCategories as $category)
                            <li class="dropdown dropdown-mega-menu">
                                <a class="dropdown-item nav-link dropdown-toggler" href="/{{ Config('app.locale') }}/{{$category->slug}}/" data-toggle="dropdown"><i class="{{$category->icon}}"></i> <span>{{$category->title}}</span></a>
                                <div class="dropdown-menu">
                                    <ul class="mega-menu d-lg-flex">
                                        {{-- <li class="mega-menu-col col-lg-4">
                                            <ul class="d-lg-flex"> --}}
                                                @if(count($category->subcategory))
                                                    @include('site.subCategoryList',['subcategories' => $category->subcategory])
                                                @endif
                                            {{-- </ul>
                                        </li> --}}
                                        {{-- <li class="mega-menu-col col-lg-5">
                                            <div class="header-banner2">
                                                <img src="assets/images/menu_banner7.jpg" alt="menu_banner">
                                                <div class="banne_info">
                                                    <h6>20% Off</h6>
                                                    <h4>Computers</h4>
                                                    <a href="#">Shop now</a>
                                                </div>
                                            </div>
                                            <div class="header-banner2">
                                                <img src="assets/images/menu_banner8.jpg" alt="menu_banner">
                                                <div class="banne_info">
                                                    <h6>15% Off</h6>
                                                    <h4>Top Laptops</h4>
                                                    <a href="#">Shop now</a>
                                                </div>
                                            </div>
                                        </li> --}}
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="more_categories">More Categories</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle" aria-expanded="false"> 
                        <span class="ion-android-menu"></span>
                    </button>
                    <div class="pr_search_icon">
                        <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                    </div> 
                    <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                        <ul class="navbar-nav">
                            @foreach ($pages as $p)
                                <li><a class="nav-link nav_item" href="/{{ Config('app.locale') }}{{$p->link}}">{{$p->title}}</a></li>
                            @endforeach  
                        </ul>
                    </div>
                    <div class="contact_phone contact_support">
                        <i class="linearicons-phone-wave"></i>
                        <span>123-456-7689</span>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
{{-- </header> --}}
<!-- END HEADER -->

<!-- START SECTION BANNER -->
<div class="mt-4 staggered-animation-wrap">
<div class="custom-container">
    <div class="row">
        <div class="col-lg-7 offset-lg-3">
            <div class="banner_section shop_el_slider">
                <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active background_bg" data-img-src="/assets/images/banner13.jpg">
                            <div class="banner_slide_content banner_content_inner">
                                <div class="col-lg-7 col-10">
                                    <div class="banner_content3 overflow-hidden">
                                        <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">Get up to 50% off Today Only!</h5>
                                        <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">Dual Camera 20MP</h2>
                                        <h4 class="staggered-animation mb-4 product-price" data-animation="slideInLeft" data-animation-delay="1.2s"><span class="price">$45.00</span><del>$55.25</del></h4>
                                        <a class="btn btn-fill-out btn-radius staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item background_bg" data-img-src="/assets/images/banner14.jpg">
                            <div class="banner_slide_content banner_content_inner">
                                <div class="col-lg-8 col-10">
                                    <div class="banner_content3 overflow-hidden">
                                        <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">50% off in all products</h5>
                                        <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">Smart Watches</h2>
                                        <h4 class="staggered-animation mb-3 mb-sm-4 product-price" data-animation="slideInLeft" data-animation-delay="1.2s"><span class="price">$45.00</span><del>$55.25</del></h4>
                                        <a class="btn btn-fill-out btn-radius staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item background_bg" data-img-src="/assets/images/banner15.jpg">
                            <div class="banner_slide_content banner_content_inner">
                                <div class="col-lg-8 col-10">
                                    <div class="banner_content3 overflow-hidden">
                                        <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">Taking your Viewing Experience to Next Level</h5>
                                        <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">Beat Headphone</h2>
                                        <h4 class="staggered-animation mb-4 product-price" data-animation="slideInLeft" data-animation-delay="1.2s"><span class="price">$45.00</span><del>$55.25</del></h4>
                                        <a class="btn btn-fill-out btn-radius staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ol class="carousel-indicators indicators_style3">
                        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-lg-2 d-none d-lg-block">
            <div class="shop_banner2 el_banner1">
                <a href="#" class="hover_effect1">
                    <div class="el_title text_white">
                        <h6>iphone Collection</h6>
                        <span>25% off</span>
                    </div>
                    <div class="el_img">
                        <img src="/assets/images/shop_banner_img6.png" alt="shop_banner_img6">
                    </div>
                </a>
            </div>
            <div class="shop_banner2 el_banner2">
                <a href="#" class="hover_effect1">
                    <div class="el_title text_white">
                        <h6>MAC Computer</h6>
                        <span><u>Shop Now</u></span>
                    </div>
                    <div class="el_img">
                        <img src="/assets/images/shop_banner_img7.png" alt="shop_banner_img7">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END SECTION BANNER -->

<!-- END MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section small_pt pb-0">
<div class="custom-container">
    <div class="row">
        <div class="col-xl-3 d-none d-xl-block">
            <div class="sale-banner">
                <a class="hover_effect1" href="#">
                    <img src="/assets/images/shop_banner_img6.jpg" alt="shop_banner_img6">
                </a>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="row">
                <div class="col-12">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h4>{{__('lang.exclusiveproducts')}}</h4>
                        </div>
                        <div class="tab-style2">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false"> 
                                <span class="ion-android-menu"></span>
                            </button>
                            <ul class="nav nav-tabs justify-content-center justify-content-md-end" id="tabmenubar" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="arrival-tab" data-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true">{{__('lang.new')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="sale-tab" data-toggle="tab" href="#sale" role="tab" aria-controls="sale" aria-selected="false">{{__('lang.sale')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="mostview-tab" data-toggle="tab" href="#mostview" role="tab" aria-controls="mostview" aria-selected="false">{{__('lang.mostview')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="mostsold-tab" data-toggle="tab" href="#mostsold" role="tab" aria-controls="mostsold" aria-selected="false">{{__('lang.mostsold')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab_slider">
                        <div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                            <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>                                
                                @foreach ($datanew as $d)
                                <div class="item">
                                    <div class="product_wrap">
                                        <span class="pr_flash">Yeni</span>
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img src="{{Voyager::image($d->thumbnail('imggrid'))}}" alt="el_img1">
                                                @php 
                                                    $pictures = json_decode($d->allimage); 

                                                    $pic = $pictures[0];
                                                    $ext = pathinfo($pic, PATHINFO_EXTENSION);
                                                    $name = rtrim($pic, '.'.$ext);
                                                    $imggridpic = $name.'-imggrid.'.$ext;
                                                @endphp
                                                <img class="product_hover_img" src="{{Voyager::image($imggridpic)}}" alt="">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart cartpid" data-productid="{{$d->id}}"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li class="favopid" data-productid="{{$d->id}}"><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="/{{ Config('app.locale') }}/product/{{$d->slug}}">{{$d->title}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">{{$d->saleprice > 0 ? $d->saleprice : $d->price}} Azn</span>
                                                @if ($d->saleprice > 0)
                                                    <del>{{$d->price}} Azn</del>
                                                    <div class="on_sale" >
                                                        <span>{{100-round($d->saleprice/$d->price * 100)}}%</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                                <span class="rating_num">(21)</span>
                                            </div>
                                            <div class="pr_desc">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
                            <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                @foreach ($datasale as $d)
                                <div class="item">
                                    <div class="product_wrap">
                                        <span class="pr_flash bg-success">Endirim</span>
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img src="{{Voyager::image($d->thumbnail('imggrid'))}}" alt="el_img1">
                                                @php 
                                                    $pictures = json_decode($d->allimage); 

                                                    $pic = $pictures[0];
                                                    $ext = pathinfo($pic, PATHINFO_EXTENSION);
                                                    $name = rtrim($pic, '.'.$ext);
                                                    $imggridpic = $name.'-imggrid.'.$ext;
                                                @endphp
                                                <img class="product_hover_img" src="{{Voyager::image($imggridpic)}}" alt="">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart cartpid" data-productid="{{$d->id}}"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li class="favopid" data-productid="{{$d->id}}"><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="/{{ Config('app.locale') }}/product/{{$d->slug}}">{{$d->title}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">{{$d->saleprice > 0 ? $d->saleprice : $d->price}} Azn</span>
                                                @if ($d->saleprice > 0)
                                                    <del>{{$d->price}} Azn</del>
                                                    <div class="on_sale" >
                                                        <span>{{100-round($d->saleprice/$d->price * 100)}}%</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                                <span class="rating_num">(21)</span>
                                            </div>
                                            <div class="pr_desc">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="mostview" role="tabpanel" aria-labelledby="mostview-tab">
                            <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                @foreach ($dataviewed as $d)
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img src="{{Voyager::image($d->thumbnail('imggrid'))}}" alt="el_img1">
                                                @php 
                                                    $pictures = json_decode($d->allimage); 

                                                    $pic = $pictures[0];
                                                    $ext = pathinfo($pic, PATHINFO_EXTENSION);
                                                    $name = rtrim($pic, '.'.$ext);
                                                    $imggridpic = $name.'-imggrid.'.$ext;
                                                @endphp
                                                <img class="product_hover_img" src="{{Voyager::image($imggridpic)}}" alt="">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart cartpid" data-productid="{{$d->id}}"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li class="favopid" data-productid="{{$d->id}}"><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="/{{ Config('app.locale') }}/product/{{$d->slug}}">{{$d->title}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">{{$d->saleprice > 0 ? $d->saleprice : $d->price}} Azn</span>
                                                @if ($d->saleprice > 0)
                                                    <del>{{$d->price}} Azn</del>
                                                    <div class="on_sale" >
                                                        <span>{{100-round($d->saleprice/$d->price * 100)}}%</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                                <span class="rating_num">(21)</span>
                                            </div>
                                            <div class="pr_desc">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="mostsold" role="tabpanel" aria-labelledby="mostsold-tab">
                            <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                @foreach ($datasold as $d)
                                <div class="item">
                                    <div class="product_wrap">
                                        <div class="product_img">
                                            <a href="shop-product-detail.html">
                                                <img src="{{Voyager::image($d->thumbnail('imggrid'))}}" alt="el_img1">
                                                @php 
                                                    $pictures = json_decode($d->allimage); 

                                                    $pic = $pictures[0];
                                                    $ext = pathinfo($pic, PATHINFO_EXTENSION);
                                                    $name = rtrim($pic, '.'.$ext);
                                                    $imggridpic = $name.'-imggrid.'.$ext;
                                                @endphp
                                                <img class="product_hover_img" src="{{Voyager::image($imggridpic)}}" alt="">
                                            </a>
                                            <div class="product_action_box">
                                                <ul class="list_none pr_action_btn">
                                                    <li class="add-to-cart cartpid" data-productid="{{$d->id}}"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                    <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                    <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                    <li class="favopid" data-productid="{{$d->id}}"><a href="#"><i class="icon-heart"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product_info">
                                            <h6 class="product_title"><a href="/{{ Config('app.locale') }}/product/{{$d->slug}}">{{$d->title}}</a></h6>
                                            <div class="product_price">
                                                <span class="price">{{$d->saleprice > 0 ? $d->saleprice : $d->price}} Azn</span>
                                                @if ($d->saleprice > 0)
                                                    <del>{{$d->price}} Azn</del>
                                                    <div class="on_sale" >
                                                        <span>{{100-round($d->saleprice/$d->price * 100)}}%</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:80%"></div>
                                                </div>
                                                <span class="rating_num">(21)</span>
                                            </div>
                                            <div class="pr_desc">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION BANNER --> 
<div class="section pb_20 small_pt">
<div class="custom-container">
    <div class="row">
        <div class="col-md-4">
            <div class="sale-banner mb-3 mb-md-4">
                <a class="hover_effect1" href="#">
                    <img src="/assets/images/shop_banner_img7.jpg" alt="shop_banner_img7">
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="sale-banner mb-3 mb-md-4">
                <a class="hover_effect1" href="#">
                    <img src="/assets/images/shop_banner_img8.jpg" alt="shop_banner_img8">
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="sale-banner mb-3 mb-md-4">
                <a class="hover_effect1" href="#">
                    <img src="/assets/images/shop_banner_img9.jpg" alt="shop_banner_img9">
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END SECTION BANNER --> 

<!-- START SECTION SHOP -->
<div class="section pt-0 pb-0">
<div class="custom-container">
    <div class="row">
        <div class="col-md-12">
            <div class="heading_tab_header">
                <div class="heading_s2">
                    <h4>{{__('lang.dealofday')}}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="product_slider carousel_slider owl-carousel owl-theme nav_style3" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "1"}, "650":{"items": "2"}, "1199":{"items": "2"}}'>
                <div class="item">
                    <div class="deal_wrap">
                        <div class="product_img">
                            <a href="shop-product-detail.html">
                                <img src="/assets/images/el_img1.jpg" alt="el_img1">
                            </a>
                        </div>
                        <div class="deal_content">
                            <div class="product_info">
                                <h5 class="product_title"><a href="shop-product-detail.html">Red & Black Headphone</a></h5>
                                <div class="product_price">
                                    <span class="price">$45.00</span>
                                    <del>$55.25</del>
                                </div>
                            </div>
                            <div class="deal_progress">
                                <span class="stock-sold">Already Sold: <strong>6</strong></span>
                                <span class="stock-available">Available: <strong>8</strong></span>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100" style="width:46%"> 46% </div>
                                </div>
                            </div>
                            <div class="countdown_time countdown_style4 mb-4" data-time="2020/09/02 12:30:15"></div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="deal_wrap">
                        <div class="product_img">
                            <a href="shop-product-detail.html">
                                <img src="/assets/images/el_img2.jpg" alt="el_img2">
                            </a>
                        </div>
                        <div class="deal_content">
                            <div class="product_info">
                                <h5 class="product_title"><a href="shop-product-detail.html">Smart Watch External</a></h5>
                                <div class="product_price">
                                    <span class="price">$55.00</span>
                                    <del>$95.00</del>
                                </div>
                            </div>
                            <div class="deal_progress">
                                <span class="stock-sold">Already Sold: <strong>4</strong></span>
                                <span class="stock-available">Available: <strong>22</strong></span>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="26" aria-valuemin="0" aria-valuemax="100" style="width:26%"> 26% </div>
                                </div>
                            </div>
                            <div class="countdown_time countdown_style4 mb-4" data-time="2020/09/02 12:30:15"></div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="deal_wrap">
                        <div class="product_img">
                            <a href="shop-product-detail.html">
                                <img src="/assets/images/el_img3.jpg" alt="el_img3">
                            </a>
                        </div>
                        <div class="deal_content">
                            <div class="product_info">
                                <h5 class="product_title"><a href="shop-product-detail.html">Nikon HD camera</a></h5>
                                <div class="product_price">
                                    <span class="price">$68.00</span>
                                    <del>$99.25</del>
                                </div>
                            </div>
                            <div class="deal_progress">
                                <span class="stock-sold">Already Sold: <strong>16</strong></span>
                                <span class="stock-available">Available: <strong>20</strong></span>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width:28%"> 28% </div>
                                </div>
                            </div>
                            <div class="countdown_time countdown_style4 mb-4" data-time="2020/09/02 12:30:15"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SHOP -->
<div class="section small_pt small_pb">
<div class="custom-container">
    <div class="row">
        <div class="col-xl-3 d-none d-xl-block">
            <div class="sale-banner">
                <a class="hover_effect1" href="#">
                    <img src="/assets/images/shop_banner_img10.jpg" alt="shop_banner_img10">
                </a>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="row">
                <div class="col-12">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h4>{{__('lang.favouriteproducts')}}</h4>
                        </div>
                        <div class="view_all">
                            <a href="#" class="text_default"><i class="linearicons-power"></i> <span>{{__('lang.viewall')}}</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                        @foreach ($favo->unique('product_id') as $p)
                            @foreach ($p->products as $d)
                            <div class="item">
                                <div class="product_wrap">
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <img src="{{Voyager::image($d->thumbnail('imggrid'))}}" alt="el_img1">
                                            @php 
                                                $pictures = json_decode($d->allimage); 

                                                $pic = $pictures[0];
                                                $ext = pathinfo($pic, PATHINFO_EXTENSION);
                                                $name = rtrim($pic, '.'.$ext);
                                                $imggridpic = $name.'-imggrid.'.$ext;
                                            @endphp
                                            <img class="product_hover_img" src="{{Voyager::image($imggridpic)}}" alt="">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart cartpid" data-productid="{{$d->id}}"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li class="favopid" data-productid="{{$d->id}}"><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="/{{ Config('app.locale') }}/product/{{$d->slug}}">{{$d->$title}}</a></h6>
                                        <div class="product_price">
                                            <span class="price">{{$d->saleprice > 0 ? $d->saleprice : $d->price}} Azn</span>
                                            @if ($d->saleprice > 0)
                                                <del>{{$d->price}} Azn</del>
                                                <div class="on_sale" >
                                                    <span>{{100-round($d->saleprice/$d->price * 100)}}%</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:80%"></div>
                                            </div>
                                            <span class="rating_num">(21)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach                      
                        @endforeach                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION CLIENT LOGO -->
<div class="section pt-0 small_pb">
<div class="custom-container">
    <div class="row">
        <div class="col-md-12">
            <div class="heading_tab_header">
                <div class="heading_s2">
                    <h4>{{__('lang.ourbrands')}}</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="client_logo carousel_slider owl-carousel owl-theme nav_style3" data-dots="false" data-nav="true" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}, "1199":{"items": "6"}}'>
                <div class="item">
                    <div class="cl_logo">
                        <img src="/assets/images/cl_logo1.png" alt="cl_logo"/>
                    </div>
                </div>
                <div class="item">
                    <div class="cl_logo">
                        <img src="/assets/images/cl_logo2.png" alt="cl_logo"/>
                    </div>
                </div>
                <div class="item">
                    <div class="cl_logo">
                        <img src="/assets/images/cl_logo3.png" alt="cl_logo"/>
                    </div>
                </div>
                <div class="item">
                    <div class="cl_logo">
                        <img src="/assets/images/cl_logo4.png" alt="cl_logo"/>
                    </div>
                </div>
                <div class="item">
                    <div class="cl_logo">
                        <img src="/assets/images/cl_logo5.png" alt="cl_logo"/>
                    </div>
                </div>
                <div class="item">
                    <div class="cl_logo">
                        <img src="/assets/images/cl_logo6.png" alt="cl_logo"/>
                    </div>
                </div>
                <div class="item">
                    <div class="cl_logo">
                        <img src="/assets/images/cl_logo7.png" alt="cl_logo"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END SECTION CLIENT LOGO -->

<!-- START SECTION SHOP -->
<div class="section pt-0 pb_20">
<div class="custom-container">
    <div class="row">
        <div class="col-lg-4">
            <div class="row">
                <div class="col-12">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h4>{{__('lang.saleproducts')}}</h4>
                        </div>
                        <div class="view_all">
                            <a href="#" class="text_default"><span>{{__('lang.viewall')}}</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                        @php
                         $count = 0;   
                        @endphp
                        <div class="item">
                            @foreach ($datasale as $d)
                            
                            @if ($count < 3)
                            @php
                                $count++;
                            @endphp                         
                            <div class="product_wrap">
                                <span class="pr_flash bg-success">Endirim</span>
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="{{Voyager::image($d->thumbnail('imggrid'))}}" alt="el_img3">
                                        @php 
                                            $pictures = json_decode($d->allimage); 
                                            $pic = $pictures[0];
                                            $ext = pathinfo($pic, PATHINFO_EXTENSION);
                                            $name = rtrim($pic, '.'.$ext);
                                            $imggridpic = $name.'-imggrid.'.$ext;
                                        @endphp
                                        <img class="product_hover_img" src="{{Voyager::image($imggridpic)}}" alt="el_hover_img3">
                                    </a>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="/{{ Config('app.locale') }}/product/{{$d->slug}}">{{$d->title}}</a></h6>
                                    <div class="product_price">
                                        <span class="price">{{$d->saleprice > 0 ? $d->saleprice : $d->price}} Azn</span>
                                        @if ($d->saleprice > 0)
                                            <del>{{$d->price}} Azn</del>
                                            <div class="on_sale" >
                                                <span>{{100-round($d->saleprice/$d->price * 100)}}%</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:87%"></div>
                                        </div>
                                        <span class="rating_num">(25)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                            @endif   
                            @endforeach
                        </div>
                        <div class="item">
                            @foreach ($datasale as $key => $d)
                            
                            @if ($count <= $key && $key < 6)
                            @php
                                $count++;
                            @endphp
                            <div class="product_wrap">
                                <span class="pr_flash">New</span>
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="{{Voyager::image($d->thumbnail('imggrid'))}}" alt="el_img3">
                                        @php 
                                            $pictures = json_decode($d->allimage); 
                                            $pic = $pictures[0];
                                            $ext = pathinfo($pic, PATHINFO_EXTENSION);
                                            $name = rtrim($pic, '.'.$ext);
                                            $imggridpic = $name.'-imggrid.'.$ext;
                                        @endphp
                                        <img class="product_hover_img" src="{{Voyager::image($imggridpic)}}" alt="el_hover_img3">
                                    </a>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="/{{ Config('app.locale') }}/product/{{$d->slug}}">{{$d->title}}</a></h6>
                                    <div class="product_price">
                                        <span class="price">{{$d->saleprice > 0 ? $d->saleprice : $d->price}} Azn</span>
                                        @if ($d->saleprice > 0)
                                            <del>{{$d->price}} Azn</del>
                                            <div class="on_sale" >
                                                <span>{{100-round($d->saleprice/$d->price * 100)}}%</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:87%"></div>
                                        </div>
                                        <span class="rating_num">(25)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                </div>
                            </div>                            
                            @endif   
                            @endforeach                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-12">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h4>{{__('lang.newproducts')}}</h4>
                        </div>
                        <div class="view_all">
                            <a href="#" class="text_default"><span>{{__('lang.viewall')}}</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                        @php
                         $count = 0;   
                        @endphp
                        <div class="item">
                            @foreach ($datanew as $d)
                            
                            @if ($count < 3)
                            @php
                                $count++;
                            @endphp                         
                            <div class="product_wrap">
                                <span class="pr_flash">Yeni</span>
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="{{Voyager::image($d->thumbnail('imggrid'))}}" alt="el_img3">
                                        @php 
                                            $pictures = json_decode($d->allimage); 
                                            $pic = $pictures[0];
                                            $ext = pathinfo($pic, PATHINFO_EXTENSION);
                                            $name = rtrim($pic, '.'.$ext);
                                            $imggridpic = $name.'-imggrid.'.$ext;
                                        @endphp
                                        <img class="product_hover_img" src="{{Voyager::image($imggridpic)}}" alt="el_hover_img3">
                                    </a>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="/{{ Config('app.locale') }}/product/{{$d->slug}}">{{$d->title}}</a></h6>
                                    <div class="product_price">
                                        <span class="price">{{$d->saleprice > 0 ? $d->saleprice : $d->price}} Azn</span>
                                        @if ($d->saleprice > 0)
                                            <del>{{$d->price}} Azn</del>
                                            <div class="on_sale" >
                                                <span>{{100-round($d->saleprice/$d->price * 100)}}%</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:87%"></div>
                                        </div>
                                        <span class="rating_num">(25)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                            @endif   
                            @endforeach
                        </div>
                        <div class="item">
                            @foreach ($datanew as $key => $d)
                            
                            @if ($count <= $key && $key < 6)
                            @php
                                $count++;
                            @endphp
                            <div class="product_wrap">
                                <span class="pr_flash">Yeni</span>
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="{{Voyager::image($d->thumbnail('imggrid'))}}" alt="el_img3">
                                        @php 
                                            $pictures = json_decode($d->allimage); 
                                            $pic = $pictures[0];
                                            $ext = pathinfo($pic, PATHINFO_EXTENSION);
                                            $name = rtrim($pic, '.'.$ext);
                                            $imggridpic = $name.'-imggrid.'.$ext;
                                        @endphp
                                        <img class="product_hover_img" src="{{Voyager::image($imggridpic)}}" alt="el_hover_img3">
                                    </a>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="/{{ Config('app.locale') }}/product/{{$d->slug}}">{{$d->title}}</a></h6>
                                    <div class="product_price">
                                        <span class="price">{{$d->saleprice > 0 ? $d->saleprice : $d->price}} Azn</span>
                                        @if ($d->saleprice > 0)
                                            <del>{{$d->price}} Azn</del>
                                            <div class="on_sale" >
                                                <span>{{100-round($d->saleprice/$d->price * 100)}}%</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:87%"></div>
                                        </div>
                                        <span class="rating_num">(25)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                </div>
                            </div>                            
                            @endif   
                            @endforeach                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-12">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h4>{{__('lang.mostsoldproducts')}}</h4>
                        </div>
                        <div class="view_all">
                            <a href="#" class="text_default"><span>{{__('lang.viewall')}}</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product_slider carousel_slider product_list owl-carousel owl-theme nav_style5" data-nav="true" data-dots="false" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "380":{"items": "1"}, "640":{"items": "2"}, "991":{"items": "1"}}'>
                        @php
                         $count = 0;   
                        @endphp
                        <div class="item">
                            @foreach ($datasold as $d)
                            
                            @if ($count < 3)
                            @php
                                $count++;
                            @endphp                         
                            <div class="product_wrap">
                                <span class="pr_flash bg-danger">Top satılan</span>
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="{{Voyager::image($d->thumbnail('imggrid'))}}" alt="el_img3">
                                        @php 
                                            $pictures = json_decode($d->allimage); 
                                            $pic = $pictures[0];
                                            $ext = pathinfo($pic, PATHINFO_EXTENSION);
                                            $name = rtrim($pic, '.'.$ext);
                                            $imggridpic = $name.'-imggrid.'.$ext;
                                        @endphp
                                        <img class="product_hover_img" src="{{Voyager::image($imggridpic)}}" alt="el_hover_img3">
                                    </a>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="/{{ Config('app.locale') }}/product/{{$d->slug}}">{{$d->title}}</a></h6>
                                    <div class="product_price">
                                        <span class="price">{{$d->saleprice > 0 ? $d->saleprice : $d->price}} Azn</span>
                                        @if ($d->saleprice > 0)
                                            <del>{{$d->price}} Azn</del>
                                            <div class="on_sale" >
                                                <span>{{100-round($d->saleprice/$d->price * 100)}}%</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:87%"></div>
                                        </div>
                                        <span class="rating_num">(25)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                            @endif   
                            @endforeach
                        </div>
                        <div class="item">
                            @foreach ($datasold as $key => $d)
                            
                            @if ($count <= $key && $key < 6)
                            @php
                                $count++;
                            @endphp
                            <div class="product_wrap">
                                <span class="pr_flash">New</span>
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="{{Voyager::image($d->thumbnail('imggrid'))}}" alt="el_img3">
                                        @php 
                                            $pictures = json_decode($d->allimage); 
                                            $pic = $pictures[0];
                                            $ext = pathinfo($pic, PATHINFO_EXTENSION);
                                            $name = rtrim($pic, '.'.$ext);
                                            $imggridpic = $name.'-imggrid.'.$ext;
                                        @endphp
                                        <img class="product_hover_img" src="{{Voyager::image($imggridpic)}}" alt="el_hover_img3">
                                    </a>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="/{{ Config('app.locale') }}/product/{{$d->slug}}">{{$d->title}}</a></h6>
                                    <div class="product_price">
                                        <span class="price">{{$d->saleprice > 0 ? $d->saleprice : $d->price}} Azn</span>
                                        @if ($d->saleprice > 0)
                                            <del>{{$d->price}} Azn</del>
                                            <div class="on_sale" >
                                                <span>{{100-round($d->saleprice/$d->price * 100)}}%</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:87%"></div>
                                        </div>
                                        <span class="rating_num">(25)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                </div>
                            </div>                            
                            @endif   
                            @endforeach                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
<div class="custom-container">	
    <div class="row align-items-center">	
        <div class="col-md-6">
            <div class="newsletter_text text_white">
                <h3>Join Our Newsletter Now</h3>
                <p> Register now to get updates on promotions. </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="newsletter_form2 rounded_input">
                <form>
                    <input type="text" required="" class="form-control" placeholder="Enter Email Address">
                    <button type="submit" class="btn btn-dark btn-radius" name="submit" value="Submit">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->

@endsection

@section('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var baseurl = $('.baseurl').attr('data-url');
    var lang = $('html').attr('lang');
    
    $('.cartpid').click('onclick',function(){        
        var productid = $(this).attr('data-productid');
            $.ajax({
                type: 'post',
                url: baseurl+'/apiaddcart',
                data: {'product_id':productid},
                success: function(response) {
                    var len = response.length;
                    //console.log(len);
                    var options = "";
                    var totalcartprice = 0;
                    for( var i = 0; i<len; i++){
                        var id = response[i]['products'][0]['id'];
                        var title = response[i]['products'][0]['title_'+lang];
                        var image = response[i]['products'][0]['image'];
                        if(response[i]['products'][0]['saleprice'] > 0){
                            var price = response[i]['products'][0]['saleprice'];
                        }else{
                            var price = response[i]['products'][0]['price'];
                        }                        
                        var quantity = response[i]['quantity'];
                        totalcartprice += response[i]['quantity'] * price;
                        options += "<li>\n" +
                                        "<a href='#' class='item_remove'><i class='ion-close'></i></a>\n" +
                                        "<a href='#'><img src='/storage/"+image+"' alt='cart_thumb1'>"+title+"</a>\n" +
                                        "<span class='cart_quantity'> "+quantity+" x <span class='cart_amount'> "+price+"</span><span class='price_symbole'> Azn</span></span>\n" +
                                    "</li>";
                    }

                    $('.cart_list').empty().append(options);
                    $('.cart_price').empty().append(totalcartprice);
                    $('.cart_count').empty().append(len);
                        Swal.fire(
                        'Ugurlu!',
                        'Mehsul sebete elave olundu!',
                        'success'
                        )
                },
                error: function(response) {                    
                }
            });

    })


    $('.favopid').click('onclick',function(){           
        var productid = $(this).attr('data-productid');
            $.ajax({
                type: 'post',
                url: baseurl+'/apiaddfavo',
                data: {'product_id':productid},
                success: function(response) {
                    
                     var len = response.length;
                    // console.log(response);
                    // var options = "";
                    // var totalcartprice = 0;
                    // for( var i = 0; i<len; i++){
                    //     var id = response[i]['products'][0]['id'];
                    //     var title = response[i]['products'][0]['title_'+lang];
                    //     var image = response[i]['products'][0]['image'];
                    //     var price = response[i]['products'][0]['price'];
                    //     var quantity = response[i]['quantity'];
                    //     totalcartprice += response[i]['quantity'] * price;
                    //     options += "<li>\n" +
                    //                     "<a href='#' class='item_remove'><i class='ion-close'></i></a>\n" +
                    //                     "<a href='#'><img src='/storage/"+image+"' alt='cart_thumb1'>"+title+"</a>\n" +
                    //                     "<span class='cart_quantity'> "+quantity+" x <span class='cart_amount'> "+price+"</span><span class='price_symbole'> Azn</span></span>\n" +
                    //                 "</li>";
                    // }

                    // $('.cart_list').empty().append(options);
                    // $('.cart_price').empty().append(totalcartprice);
                    $('.wishlist_count').empty().append(len);
                    Swal.fire(
                    'Ugurlu!',
                    'Mehsul favorilere elave olundu!',
                    'success'
                    )
                },
                error: function(response) {                    
                }
            });
            
    })

</script>
@endsection

@section('css')
<style>
</style>
@endsection