@extends('layouts.app')
@section('content')
@php
$ln = App::getLocale();
$title = 'title_'.$ln;
$desc = 'desc_'.$ln;
@endphp
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <ol class="breadcrumb justify-content-md-start">
                <li class="breadcrumb-item"><a href="/">{{__('lang.home')}}</a></li> 
            </div>
            <div class="col-md-6">
                <div class="page-title">
            		{{-- <h1>Shop Left Sidebar</h1> --}}
                </div>
            </div>
            
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
    	<div class="row">
			<div class="col-lg-9">
            	<div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="product_header_left">
                                {{-- <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="order">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="product_header_right">
                            	<div class="products_view">
                                    <a href="javascript:Void(0);" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:Void(0);" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                </div>
                                <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="">Showing</option>
                                        <option value="3">3</option>
                                        <option value="9">9</option>
                                        <option value="12">12</option>
                                        <option value="18">18</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row shop_container">
                    @foreach ($data as $d)
                    <div class="col-md-4 col-6">
                        <div class="product">
                            <div class="product_img">
                                <a href="shop-product-detail.html">
                                    <img src="{{Voyager::image($d->thumbnail('imggrid'))}}" alt="product_img1">
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
                                        <li><a href="#" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                        <li><a href="#" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
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
                                {{-- <div class="pr_switch_wrap">
                                    <div class="product_color_switch">
                                        <span class="active" data-color="#87554B"></span>
                                        <span data-color="#333333"></span>
                                        <span data-color="#DA323F"></span>
                                    </div>
                                </div> --}}
                                <div class="list_product_action_box">
                                    <ul class="list_none pr_action_btn">
                                        <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                        <li><a href="#" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                        <li><a href="#" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach                  
                </div>
        		<div class="row">
                    <div class="col-12">
                        {{ $data->links() }}
                    </div>                    
                </div>
        	</div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
            	<div class="sidebar">
                    <div class="widget">
                    	<h5 class="widget_title">Filter</h5>
                        <div class="filter_price">
                             <div id="price_filter" data-min="0" data-max="1000" data-min-value="@if (isset($requestall['min'])) {{$requestall['min']}} @else {{0}} @endif" data-max-value="@if (isset($requestall['max'])) {{$requestall['max']}} @else {{500}} @endif" data-price-sign="Azn"></div>
                             <div class="price_range">
                                 <span>{{__('lang.price')}}: <span id="flt_price"></span></span>
                                 <input type="hidden" id="price_first">
                                 <input type="hidden" id="price_second">
                             </div>
                         </div>
                    </div>
                    <div class="widget">
                    	<h5 class="widget_title">{{__('lang.size')}}</h5>
                        <div class="product_size_switch">
                            @foreach ($sizefilter as $s)
                                <span class="sizefilter @if (isset($requestall['size'])) {{$s->id==$requestall['size'] ? 'active' : ''}} @endif" data-sizefilter="{{$s->id}}">{{$s->title}}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="widget">
                    	<h5 class="widget_title">{{__('lang.color')}}</h5>
                        <div class="product_color_switch">
                            @foreach ($colorfilter as $c)
                                    <span class="@if (isset($requestall['color'])) {{$c->id==$requestall['color'] ? 'active' : ''}} @endif" data-colorfilter="{{$c->id}}" data-color="{{$c->code}}"></span>
                            @endforeach
                        </div>
                    </div>
                    <div class="widget">
                        <div class="shop_banner">
                            @foreach ($banner as $d)
                                @if ($d->type == 3)
                                <div class="sale-banner p-3">
                                    <a class="hover_effect1" href="{{$d->link}}">
                                        <img src="{{Voyager::image($d->image)}}" alt="shop_banner_img6">
                                    </a>
                                </div>
                                @endif
                            @endforeach 
                        </div>
                        <div class="shop_banner">
                            @foreach ($banner as $d)
                                @if ($d->type == 4)
                                <div class="sale-banner p-3">
                                    <a class="hover_effect1" href="{{$d->link}}">
                                        <img src="{{Voyager::image($d->image)}}" alt="shop_banner_img6">
                                    </a>
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
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
	<div class="container">	
    	<div class="row align-items-center">	
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>{{__('lang.subscribeus')}}</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form>
                        <input type="text" required="" class="form-control rounded-0" placeholder="{{__('lang.subscribeenteremail')}}">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">{{__('lang.subscribe')}}</button>
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

    $.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null) {
       return null;
    }
    return decodeURI(results[1]) || 0;
    }

    $('#price_filter').each( function() {
		var $filter_selector = $(this);
		var a = $filter_selector.data("min-value");
		var b = $filter_selector.data("max-value");
		var c = $filter_selector.data("price-sign");
		$filter_selector.slider({
			range: true,
			min: $filter_selector.data("min"),
			max: $filter_selector.data("max"),
            values: [ a, b ],
            change: function( event, ui ) {                
                var params = [];
                var minn = ui.values[ 0 ];
                var maxx = ui.values[ 1 ];
                var s = $.urlParam('size');
                var c = $.urlParam('color');
                var q = $.urlParam('q');
                if(minn != null){
                    params.min = minn;
                    params.max = maxx;
                }
                if(c != null){
                    params.color = c;
                }
                if(s != null){
                    params.size = s;
                }
                if(q != null){
                    params.q = q;
                }
                params = Object.assign({}, params);
                var str = jQuery.param( params );
                window.location.href = "?"+str; 

               },
			slide: function( event, ui ) {
				$( "#flt_price" ).html( ui.values[ 0 ] + c +" - "+ ui.values[ 1 ] + c );
				$( "#price_first" ).val(ui.values[ 0 ]);
				$( "#price_second" ).val(ui.values[ 1 ]);
			}
		});
		$( "#flt_price" ).html( $filter_selector.slider( "values", 0 ) + c +" - " + $filter_selector.slider( "values", 1 ) + c );
    });
    
    
    $('.product_size_switch span').click('onclick',function(){   
       // alert($( "#price_first" ).val());
        var params = [];
        var minn = $.urlParam('min');
        var maxx = $.urlParam('max');
        var c = $.urlParam('color');
        var q = $.urlParam('q');
        var s = $(this).attr('data-sizefilter');
        
        if(minn != null){
            params.min = minn;
            params.max = maxx;
        }
        if(c != null){
            params.color = c;
        }
        if(s != null){
            params.size = s;
        }
        if(q != null){
            params.q = q;
        }
        params = Object.assign({}, params);
        var str = jQuery.param( params );
        window.location.href = "?"+str; 
        
    });
    $('.product_color_switch span').click('onclick',function(){  
        var params = [];
        var minn = $.urlParam('min');
        var maxx = $.urlParam('max');
        var s = $.urlParam('size');
        var q = $.urlParam('q');
        var c = $(this).attr('data-colorfilter');
        
                
        if(minn != null){
            params.min = minn;
            params.max = maxx;
        }
        if(c != null){
            params.color = c;
        }
        if(s != null){
            params.size = s;
        }
        if(q != null){
            params.q = q;
        }
        params = Object.assign({}, params);
        var str = jQuery.param( params );
        window.location.href = "?"+str; 

    });
    
    
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
                    <?= json_encode(__('lang.success')); ?>,
                    <?= json_encode(__('lang.successcart')); ?>,
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
                $('.wishlist_count').empty().append(len);
                Swal.fire(
                <?= json_encode(__('lang.success')); ?>,
                <?= json_encode(__('lang.successfavo')); ?>,
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