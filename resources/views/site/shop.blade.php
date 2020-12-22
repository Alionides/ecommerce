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
                <div class="row">
                    <div class="col-3">
                        <div class="text-center">
                            <img class="circlesliderimg" src="{{Voyager::image($shop->image)}}">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-12"><h4 class="circleslidertitle1">{{$shop->name}}</h4></div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12"><h6 class="text-muted">33.6B Takipçi</h6><button type="button" class="btn btn-outline-alicart btn-sm">TAKİP ET</button></div>
                                    {{-- <div class="col-6"></div> --}}
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-start">
                    <li class="breadcrumb-item"><a href="/">Ana Səhifə</a></li>            
                    <?php $link = "" ?>
                    @for($i = 1; $i <= count(Request::segments()); $i++)
                        @if($i <= count(Request::segments()) & $i > 0)
                            <?php $link .= "/" . Request::segment($i); ?>
                            @if($ln != Request::segment($i))
                                @if($i != count(Request::segments()))
                                <li class="breadcrumb-item"><a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a> </li>
                                @else
                                <li class="breadcrumb-item active">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</li>
                                @endif
                            @endif
                        @endif
                    @endfor
                </ol>
            </div>
            
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section small_pt pb_70">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
            	<div class="heading_s1 text-center">
                	<h2>Exclusive Products</h2>
                </div>
            </div>
		</div>
        <div class="row">
        	<div class="col-12">
            	<div class="tab-style1">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="arrival-tab" data-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true">New Arrival</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sellers-tab" data-toggle="tab" href="#sellers" role="tab" aria-controls="sellers" aria-selected="false">Best Sellers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="featured-tab" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false">Featured</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="special-tab" data-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="false">Special Offer</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                	<div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                        <div class="row shop_container">
                            @foreach ($data as $d)
                            <div class="col-lg-3 col-md-4 col-6">
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
                                                    <li class="add-to-cart cartpid" data-productid="{{$d->id}}""><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
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
                            </div>
                            @endforeach                         
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <ul class="pagination mt-3 justify-content-center pagination_style1">
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a></li>
                                </ul>
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