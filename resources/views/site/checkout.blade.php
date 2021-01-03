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
                    <li class="breadcrumb-item active"><a href="#">{{__('lang.checkout')}}</a></li>
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

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        {{-- <div class="row">
            <div class="col-lg-6">
            	<div class="toggle_info">
                	<span><i class="fas fa-user"></i>Returning customer? <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">Click here to login</a></span>
                </div>
                <div class="panel-collapse collapse login_form" id="loginform">
                    <div class="panel-body">
                    	<p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                    	<form method="post">
                            <div class="form-group">
                                <input type="text" required="" class="form-control" name="" placeholder="Username Or Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" required="" type="password" name="" placeholder="Password">
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                        <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                    </div>
                                </div>
                                <a href="#">Forgot password?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            	<div class="toggle_info">
            		<span><i class="fas fa-tag"></i>Have a coupon? <a href="#coupon" data-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter your code</a></span>
                </div>
                <div class="panel-collapse collapse coupon_form" id="coupon">
                    <div class="panel-body">
                    	<p>If you have a coupon code, please apply it below.</p>
                        <div class="coupon field_form input-group">
                            <input type="text" value="" class="form-control" placeholder="Enter Coupon Code..">
                            <div class="input-group-append">
                                <button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-12">
            	{{-- <div class="medium_divider"></div> --}}
            	<div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
            	<div class="medium_divider"></div>
            </div>
        </div>
        <form class="checkoutform" method="post">
        @csrf
        <div class="row">
        	<div class="col-md-6">
            	<div class="heading_s1">
            		<h4>{{__('lang.billdet')}}</h4>
                </div>
                    
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" value="{{Auth::check() ? Auth::user()->name : ''}}" required class="form-control" name="billing_name" placeholder="{{__('lang.entername')}} *">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{Auth::check() ? Auth::user()->email : ''}}" required class="form-control" name="billing_email" placeholder="{{__('lang.enteremail')}} *">
                    </div>
                    <div class="form-group">
                        <input class="form-control phone" value="{{Auth::check() ? Auth::user()->phone : ''}}" required type="text" name="billing_phone" placeholder="{{__('lang.enterphone')}} *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" value="{{Auth::check() ? Auth::user()->address : ''}}" required type="text" name="billing_address" placeholder="{{__('lang.address')}} *">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{Auth::check() ? Auth::user()->city : ''}}" name="billing_city" required="" placeholder="{{__('lang.city')}} *">
                    </div>
                    <div class="form-group">
                        <input class="form-control postal" value="{{Auth::check() ? Auth::user()->postal : ''}}" required type="text" name="billing_postalcode" placeholder="{{__('lang.postalcode')}} *">
                    </div>
                    {{-- <div class="form-group">
                        <div class="chek-form">
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount">
                                <label class="form-check-label label_info" for="createaccount"><span>Create an account?</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group create-account">
                        <input class="form-control" required type="password" placeholder="Password" name="password" >
                    </div>
                    <div class="ship_detail">
                    	<div class="form-group">
                    	<div class="chek-form">
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="differentaddress">
                                <label class="form-check-label label_info" for="differentaddress"><span>Ship to a different address?</span></label>
                            </div>
                        </div>
                    </div>
                    	<div class="different_address">
                        <div class="form-group">
                            <input type="text" required class="form-control" name="fname" placeholder="First name *">
                        </div>
                        <div class="form-group">
                            <input type="text" required class="form-control" name="lname" placeholder="Last name *">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required type="text" name="cname" placeholder="Company Name">
                        </div>                        
                        <div class="form-group">
                            <input type="text" class="form-control" name="billing_address" required="" placeholder="Address *">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="billing_address2" required="" placeholder="Address line2">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required type="text" name="city" placeholder="City / Town *">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required type="text" name="state" placeholder="State / County *">
                        </div>
                        <div class="form-group">
                            <input class="form-control" required type="text" name="zipcode" placeholder="Postcode / ZIP *">
                        </div>
                    </div>
                    </div> --}}
                    <div class="heading_s1">
                        <h4>{{__('lang.additionalinform')}}</h4>
                    </div>
                    <div class="form-group mb-0">
                        <textarea name="comment" rows="5" class="form-control" placeholder="{{__('lang.ordernote')}}"></textarea>
                    </div>
                {{-- </form> --}}
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>{{__('lang.yourorder')}}</h4>
                    </div>
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{__('lang.product')}}</th>
                                    <th>{{__('lang.total')}}</th>
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
                                        
                                    <tr>
                                        <td>{{$ca->$title}} <span class="product-qty">x {{$c->quantity}}</span></td>
                                        <td>{{$c->quantity*$price}} Azn</td>
                                        <input type="hidden" type="text" name="productid[]" value="{{$ca->id}}"/>
                                        <input type="hidden" type="text" name="quantity[]" value="{{$c->quantity}}"/>
                                        <input type="hidden" type="text" name="product_price[]" value="{{$price}}"/>
                                        
                                    </tr>
                                    @endforeach   
                                @endforeach
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>{{__('lang.subtotal')}}</th>
                                    <td class="product-subtotal">{{$totalcartprice}} Azn</td>
                                    <input type="hidden" type="text" name="billing_total" value="{{$totalcartprice}}"/>
                                </tr>
                                <tr>
                                    <th>{{__('lang.shipping')}}</th>
                                    <td>{{__('lang.freeshipping')}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('lang.total')}}</th>
                                    <td class="product-subtotal">{{$totalcartprice}} Azn</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="heading_s1">
                            <h4>{{__('lang.payment')}}</h4>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" value="Qapıda Ödəmə" checked="">
                                <label class="form-check-label" for="exampleRadios3">{{__('lang.payatdoor')}}</label>
                                {{-- <p data-method="option3" class="payment-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p> --}}
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios5" value="Kartla Ödəmə">
                                <label class="form-check-label" for="exampleRadios5">Visa/MasterCard</label>
                                {{-- <p data-method="option5" class="payment-text">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p> --}}
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-fill-out btn-block checkoutbtn">{{__('lang.placeorder')}}</a>
                </div>
            </div>
        </div>
        </form> 
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
<script src="/assets/js/jquery.mask.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var baseurl = $('.baseurl').attr('data-url');
    var lang = $('html').attr('lang');
    
    $(".phone").mask("+994 00-000-00-00");

    $('.phone').click('onclick',function(){
       // console.log($(".phone").val());
        var val = $(".phone").val()
        if (val == '') {
            $(".phone").val('+994');
        }else{
            $(".phone").mask("+994 00-000-00-00");
        }
    });

    $(".postal").mask("AZ0000");
    $('.postal').click('onclick',function(){
       // console.log($(".phone").val());
        var val = $(".postal").val()
        if (val == '') {
            $(".postal").val('AZ');
        }else{
            $(".postal").mask("AZ0000");
        }
    });

    $('.checkoutbtn').click('onclick',function(){
            $.ajax({
                type: 'post',
                url: baseurl+'/checkout',
                data: $('.checkoutform').serialize(),
                success: function(response) {
                   // var len = response.length;
                    console.log(response);
                    if(response.statuscode == 200){
                        Swal.fire(
                        <?= json_encode(__('lang.success')); ?>,
                        <?= json_encode(__('lang.successorder')); ?>,
                        'success'
                        );
                        $('.checkoutform')[0].reset();
                        // setTimeout(function(){
                        //     location.reload();
                        // }, 1000);
                    }else{
                        Swal.fire(
                        <?= json_encode(__('lang.error')); ?>,
                        <?= json_encode(__('lang.errorfields')); ?>,
                        'error'
                        );
                        // setTimeout(function(){
                        //     location.reload();
                        // }, 1000);
                    }                     
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