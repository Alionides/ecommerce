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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Product Detail Thumbnails Left</li>
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
<div class="section">
    <form class="mainform" action="#" method="get">
	<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive shop_cart_table">
                	<table class="table">
                    	<thead>
                        	<tr>
                            	<th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalcartprice = 0;
                            @endphp
                            @foreach ($allcart as $key => $c)
                                @foreach ($c->products as $ca)
                                    @php
                                        $ca->saleprice > 0 ? $price = $ca->saleprice : $price = $ca->price;
                                        $totalcartprice += $c->quantity*$price;
                                    @endphp
                                    <tr class="cartdiv-{{$key}}">
                                        <td class="product-thumbnail"><a href="#"><img src="/storage/{{$ca->image}}" alt="product1"></a></td>
                                        <td class="product-name" data-title=""><a href="#">{{$ca->$title}}</a></td>
                                        <td class="product-price ac_price" data-price="{{$price}}">{{$price}} Azn</td>
                                        <td class="product-quantity ac_quantity" data-quantity="{{$c->quantity}}">
                                            <div class="quantity">
                                                <input type="button" value="-" class="minus ac_minus" data-minuskey="{{$key}}" data-productid="{{$ca->id}}">
                                                <input type="text" name="quantity" value="{{$c->quantity}}" title="Qty" class="qty" size="4">
                                                <input type="button" value="+" class="plus ac_plus" data-pluskey="{{$key}}" data-productid="{{$ca->id}}">
                                            </div>
                                        </td>
                                        <td class="product-subtotal ac_total" data-total="Total">{{$c->quantity*$price}} Azn</td>
                                        <td class="product-remove" data-title="Remove"><a href="#"><i class="ti-close"></i></a></td>
                                    </tr>
                                @endforeach   
                            @endforeach
                        </tbody>
                        <tfoot>
                        	<tr>
                            	<td colspan="6" class="px-0">
                                	<div class="row no-gutters align-items-center">

                                    	<div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                            <div class="coupon field_form input-group">
                                                <input type="text" value="" class="form-control form-control-sm" placeholder="Enter Coupon Code..">
                                                <div class="input-group-append">
                                                	<button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                                                </div>
                                            </div>
                                    	</div>
                                        <div class="col-lg-8 col-md-6 text-left text-md-right">
                                            <button class="btn btn-line-fill btn-sm updatecart" type="submit">Update Cart</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            	<div class="medium_divider"></div>
            	<div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
            	<div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
            	{{-- <div class="heading_s1 mb-3">
            		<h6>Calculate Shipping</h6>
                </div>
                <form class="field_form shipping_calculator">
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <div class="custom_select">
                                <select class="form-control">
                                    <option value="">Choose a option...</option>
                                    <option value="AX">Aland Islands</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <input required="required" placeholder="State / Country" class="form-control" name="name" type="text">
                        </div>
                        <div class="form-group col-lg-6">
                            <input required="required" placeholder="PostCode / ZIP" class="form-control" name="name" type="text">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <button class="btn btn-fill-line" type="submit">Update Totals</button>
                        </div>
                    </div>
                </form> --}}
            </div>
            <div class="col-md-6">
            	<div class="border p-3 p-md-4">
                    <div class="heading_s1 mb-3">
                        <h6>Cart Totals</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">Cart Subtotal</td>
                                    <td class="cart_total_amount">{{$totalcartprice}} Azn</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Shipping</td>
                                    <td class="cart_total_amount">Free Shipping</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount"><strong>{{$totalcartprice}} Azn</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="/{{ Config('app.locale') }}/checkout" class="btn btn-fill-out checkout">Proceed To CheckOut</a>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
	<div class="container">	
    	<div class="row align-items-center">	
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>Subscribe Our Newsletter</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form>
                        <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
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

    $('.ac_plus').click('onclick',function(){
        if ($(this).prev().val()) {   
            //this code is inside scripts.js commented
            $(this).prev().val(+$(this).prev().val() + 1);  
            var productid = $(this).attr('data-productid');
            $.ajax({
                type: 'post',
                url: baseurl+'/apiaddcart',
                data: {'product_id':productid},
                success: function(response) {
                    var len = response.length;
                    //console.log(len);
                    Swal.fire(
                    'Ugurlu!',
                    'Mehsul sebete elave olundu!',
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
            $.ajax({
                type: 'post',
                url: baseurl+'/apiremovecart',
                data: {'product_id':productid},
                success: function(response) {
                    var len = response.length;
                    //console.log(len);
                    Swal.fire(
                    'Ugurlu!',
                    'Mehsul sebete elave olundu!',
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

</script>
@endsection

@section('css')
<style>
</style>
@endsection