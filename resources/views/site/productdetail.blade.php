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
                    <li class="breadcrumb-item"><a href="#">{{__('lang.home')}}</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{__('lang.product')}}</a></li>
                </ol>
            </div>
        	<div class="col-md-6">                
            </div>            
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
{{-- @foreach ($data as $d)
@endforeach --}}
<div class="section">
	<div class="container">
		<div class="row">
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div class="product-image vertical_gallery">
                    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">
                        
                        <div class="item">
                            <a href="#" class="product_gallery_item active" data-image="{{Voyager::image($data->thumbnail('imgdetail'))}}" data-zoom-image="{{Voyager::image($data->image)}}">
                                <img src="{{Voyager::image($data->thumbnail('imgslider'))}}" alt="product_small_img1" />
                            </a>
                        </div>

                        @php 
                            $pictures = json_decode($data->allimage); 
                        @endphp
                        
                        @if(!is_null($pictures))
                            @foreach ($pictures as $p)
                            <div class="item">
                                <a href="#" class="product_gallery_item" data-image="{{ Voyager::image($data->getThumbnail($p, 'imgdetail')) }}" data-zoom-image="{{Voyager::image($p)}}">
                                    <img src="{{ Voyager::image($data->getThumbnail($p, 'imgslider')) }}" alt="product_small_img1" />
                                </a>
                            </div>
                            @endforeach
                        @endif

                    </div>
                    <div class="product_img_box">
                        <img id="product_img" src='{{Voyager::image($data->thumbnail('imgdetail'))}}' data-zoom-image="{{Voyager::image($data->image)}}" alt="product_img1" />
                        <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="linearicons-zoom-in"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="pr_detail">
                    <div class="product_description">
                        <h4 class="product_title"><a href="#">{{$data->title}}</a></h4>
                        <div class="product_price">
                            <span class="price">{{$data->saleprice > 0 ? $data->saleprice : $data->price}} Azn</span>
                            @if ($data->saleprice > 0)
                                <del>{{$data->price}} Azn</del>
                                <div class="on_sale" >
                                    <span>{{100-round($data->saleprice/$data->price * 100)}}%</span>
                                </div>
                            @endif
                        </div>
                        <div class="rating_wrap">
                                <div class="rating">
                                    <div class="product_rate" style="width:{{reviewPercent($data->review,count($data->review))}}%"></div>
                                </div>
                                <span class="rating_num">({{count($data->review)}})</span>
                            </div>
                        <div class="pr_desc">
                            <p>{{ Str::limit($data->desc, 200) }}</p>
                        </div>
                        <div class="product_sort_info">
                            <ul>
                                <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand Warranty</li>
                                <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                            </ul>
                        </div>
                        <span class="selectedcolor" data-selectedcolor=''></span>
                        <span class="selectedsize" data-selectedsize=''></span>
                        <div class="pr_switch_wrap">
                            <span class="switch_lable">Color</span>
                            <div class="product_color_switch">
                                @php 
                                    $color = json_decode($data->color); 
                                    $size = json_decode($data->size); 
                                @endphp
                                @if(!is_null($color))
                                    @foreach ($color as $c)
                                    <span class="color" data-colorname="{{ $colorfilter[$c-1]->title_az}}" data-color="{{ $colorfilter[$c-1]->code}}"></span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="pr_switch_wrap">
                            <span class="switch_lable">Size</span>
                            <div class="product_size_switch">
                                @if(!is_null($size))
                                    @foreach ($size as $c)
                                    <span class="size" data-size="{{ $sizefilter[$c-1]->title}}">{{ $sizefilter[$c-1]->title}}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="cart_extra">
                        <div class="cart-product-quantity">
                            <div class="quantity">
                                <input type="button" value="-" class="minus ac_minus" data-productid="{{$data->id}}">
                                <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                <input type="button" value="+" class="plus ac_plus" data-productid="{{$data->id}}">
                            </div>
                        </div>
                        <div class="cart_btn">
                            <button class="btn btn-fill-out btn-addtocart cartpid"  data-productid="{{$data->id}}" type="button"><i class="icon-basket-loaded"></i> Add to cart</button>
                            <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                            <a class="add_wishlist favopid"  data-productid="{{$data->id}}" href="#"><i class="icon-heart"></i></a>
                        </div>
                    </div>
                    <hr />
                    <ul class="product-meta">
                        <li>SKU: <a href="#">{{uniqid()}}</a></li>
                        <li>Category: <a href="#">{{$data->categories->title_az}}</a></li>
                        {{-- <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li> --}}
                    </ul>
                    
                    <div class="product_share">
                        <span>Share:</span>
                        <ul class="social_icons">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="large_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="tab-style3">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                      	</li>
                      	<li class="nav-item">
                        	<a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                      	</li>
                      	<li class="nav-item">
                        	<a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews ({{count($data->review)}})</a>
                      	</li>
                    </ul>
                	<div class="tab-content shop_info_tab">
                      	<div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                        	<p>{{ $data->desc }}</p>
                      	</div>
                      	<div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                        	<table class="table table-bordered">
                            	<tr>
                                	<td>Capacity</td>
                                	<td>5 Kg</td>
                            	</tr>
                                <tr>
                                    <td>Color</td>
                                    <td>Black, Brown, Red,</td>
                                </tr>
                                <tr>
                                    <td>Water Resistant</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td>Material</td>
                                    <td>Artificial Leather</td>
                                </tr>
                        	</table>
                      	</div>
                      	<div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                        	<div class="comments">
                            	<h5 class="product_tab_title">2 Review For <span>Blue Dress For Woman</span></h5>
                                <ul class="list_none comment_list mt-4">
                                    @foreach ($data->review as $r)
                                        
                                    
                                    <li>
                                        <div class="comment_img">
                                            <img src="/assets/images/user1.jpg" alt="user1"/>
                                        </div>
                                        <div class="comment_block">
                                            <div class="rating_wrap">
                                                <div class="rating">
                                                    <div class="product_rate" style="width:{{$r->review}}%"></div>
                                                </div>
                                            </div>
                                            <p class="customer_meta">
                                                <span class="review_author">{{$r->name}}</span>
                                                <span class="comment-date">{{$r->created_at}}</span>
                                            </p>
                                            <div class="description">
                                                <p>{{$r->desc}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach                                    
                                </ul>
                            </div>

                            @if (auth()->user())
                            <div class="review_form field_form">
                                <h5>Add a review</h5>
                                <form class="row mt-3">
                                    <div class="form-group col-12">
                                        <span class="selectedstar" data-star="0"></span>
                                        <div class="star_rating">                                            
                                            <span data-value="1"><i class="far fa-star"></i></span>
                                            <span data-value="2"><i class="far fa-star"></i></span> 
                                            <span data-value="3"><i class="far fa-star"></i></span>
                                            <span data-value="4"><i class="far fa-star"></i></span>
                                            <span data-value="5"><i class="far fa-star"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <textarea required="required" placeholder="Your review *" class="form-control reviewtext" name="message" rows="4"></textarea>
                                    </div>
                                    {{-- <div class="form-group col-md-6">
                                        <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                                     </div>
                                    <div class="form-group col-md-6">
                                        <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email">
                                    </div> --}}
                                   
                                    <div class="form-group col-12">
                                        <a style="color:white" type="submit" class="btn btn-fill-out reviewbtn" name="submit" value="Submit" data-productid="{{$data->id}}">Submit Review</a>
                                    </div>
                                </form>
                            </div>
                            @endif
                      	</div>
                	</div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="small_divider"></div>
            	<div class="divider"></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="heading_s1">
                	<h3>Releted Products</h3>
                </div>
            	<div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                    @foreach ($similar as $d)
                    <div class="item">
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
                                        <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
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
                                        <div class="product_rate" style="width:{{reviewPercent($d->review,count($d->review))}}%"></div>
                                    </div>
                                    <span class="rating_num">({{count($d->review)}})</span>
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
                            </div>
                        </div>
                    </div>
                    @endforeach                    
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

    
    $('.star_rating span').click('onclick',function(){  
        var starvalue = $(this).attr('data-value');        
        $('.selectedstar').attr('data-star',starvalue*20);
        var selectedstar = $('.selectedstar').attr('data-star');
        // Swal.fire(
        // selectedstar,
        // '',
        // 'success'
        // );
    });

    $('.product_color_switch span').click('onclick',function(){  
        var c = $(this).attr('data-colorname');
        $('.selectedcolor').attr('data-selectedcolor',c);
    });
    $('.product_size_switch span').click('onclick',function(){  
        var s = $(this).attr('data-size');
        $('.selectedsize').attr('data-selectedsize',s);
    });
    

    $('.add_compare').click('onclick',function(){
        var clr = $('.selectedcolor').attr('data-selectedcolor');
        var sze = $('.selectedsize').attr('data-selectedsize');
        console.log(sze);
    });
    $('.reviewbtn').click('onclick',function(){
        var star = $('.selectedstar').attr('data-star');
        var text = $('.reviewtext').val();
        var productid = $(this).attr('data-productid');
        //alert(productid);
        $.ajax({
                type: 'post',
                url: baseurl+'/apireview',
                data: {'product_id':productid,'star':star,'text':text},
                success: function(response) {
                    var len = response.length;
                    console.log(response);
                    if(response == 'hasreview'){
                        Swal.fire(
                        <?= json_encode(__('lang.error')); ?>,
                        <?= json_encode(__('lang.errorreview')); ?>,
                        'error'
                        );
                    }else{
                    Swal.fire(
                    <?= json_encode(__('lang.success')); ?>,
                    <?= json_encode(__('lang.successcart')); ?>,
                    'success'
                    );
                    // setTimeout(function(){
                    //     location.reload();
                    // }, 3000);    
                    }                 
                },
                error: function(response) {                    
                }
        });
    });
    $('.ac_plus').click('onclick',function(){
        if ($(this).prev().val()) {   
            //this code is inside scripts.js commented
            $(this).prev().val(+$(this).prev().val() + 1);  
            var productid = $(this).attr('data-productid');
            var color = $('.selectedcolor').attr('data-selectedcolor');
            var size = $('.selectedsize').attr('data-selectedsize');
            $.ajax({
                type: 'post',
                url: baseurl+'/apiaddcart',
                data: {'product_id':productid,'color':color,'size':size},
                success: function(response) {
                    var len = response.length;
                    //console.log(len);
                    Swal.fire(
                    <?= json_encode(__('lang.success')); ?>,
                    <?= json_encode(__('lang.successcart')); ?>,
                    'success'
                    );
                    setTimeout(function(){
                        location.reload();
                    }, 1000);                     
                },
                error: function(response) {                    
                }
            });
        }
    })
    $('.ac_minus').click('onclick',function(){
        if ($(this).next().val() > 1) {    
            //this code is inside scripts.js commented
            if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);

            var productid = $(this).attr('data-productid');
            var color = $('.selectedcolor').attr('data-selectedcolor');
            var size = $('.selectedsize').attr('data-selectedsize');
            $.ajax({
                type: 'post',
                url: baseurl+'/apiremovecart',
                data: {'product_id':productid,'color':color,'size':size},
                success: function(response) {
                    var len = response.length;
                    //console.log(len);
                    Swal.fire(
                    <?= json_encode(__('lang.success')); ?>,
                    <?= json_encode(__('lang.successcart')); ?>,
                    'success'
                    );
                    setTimeout(function(){
                        location.reload();
                    }, 1000);                     
                },
                error: function(response) {                    
                }
            });
        }
    })
    
    $('.cartpid').click('onclick',function(){        
        var productid = $(this).attr('data-productid');
        var color = $('.selectedcolor').attr('data-selectedcolor');
        var size = $('.selectedsize').attr('data-selectedsize');
        $.ajax({
            type: 'post',
            url: baseurl+'/apiaddcart',
            data: {'product_id':productid,'color':color,'size':size},
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