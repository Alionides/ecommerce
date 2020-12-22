@extends('layouts.app')
@section('content')

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>{{__('lang.myaccount')}}</h1>
                </div>
            </div>
            <div class="col-md-6">
                {{-- <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">My Account</li>
                </ol> --}}
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
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>{{__('lang.dashboard')}}</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>{{__('lang.orders')}}</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-key"></i>{{__('lang.password')}}</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>{{__('lang.accountdetails')}}</a>
                      </li>
                      <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" type="submit" class="nav-link" href="{{route('logout')}}"><i class="ti-lock"></i>{{__('lang.logout')}}</a>
                        </form>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                  	<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>{{__('lang.dashboard')}}</h3>
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                  	</div>
                  	<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>{{__('lang.orders')}}</h3>
                            </div>
                            <div class="card-body">
                    			<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{__('lang.order')}}</th>
                                                <th>{{__('lang.price')}}</th>
                                                <th>{{__('lang.status')}}</th>
                                                <th>{{__('lang.date')}}</th>                                                
                                                <th></th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order as $key => $o)                                            
                                            <tr>
                                                <td>#{{$o->id}}</td>
                                                <td>{{$o->billing_total}} Azn</td>
                                                {{-- <td>{{$order[$key]->products[$key]->pivot->quantity}}</td> --}}
                                                <td><span class="badge badge-pill badge-success">
                                                    gonderildi{{$o->status}}
                                                </span></td>
                                                <td>{{$o->created_at}}</td>
                                                <td><a href="#" class="btn btn-fill-out btn-sm showorder" data-orderid="{{$o->id}}">View</a></td>
                                            </tr>
                                            @endforeach
                                            {{-- <tr>
                                                <td>#2366</td>
                                                <td>June 20, 2020</td>
                                                <td>Completed</td>
                                                <td>$81.00 for 1 item</td>
                                                <td><a href="#" class="btn btn-fill-out btn-sm">View</a></td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                  	</div>
					<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>{{__('lang.passworddetails')}}</h3>
                            </div>
                            <div class="card-body">
                                <form class="passwordform" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                        	<label>{{__('lang.currentpassword')}} <span class="required">*</span></label>
                                            <input required="" class="form-control" name="password" type="password">
                                        </div>
                                        <div class="form-group col-md-12">
                                        	<label>{{__('lang.newpassword')}} <span class="required">*</span></label>
                                            <input required="" class="form-control" name="npassword" type="password">
                                        </div>
                                        <div class="form-group col-md-12">
                                        	<label>{{__('lang.confirmpassword')}} <span class="required">*</span></label>
                                            <input required="" class="form-control" name="cpassword" type="password">
                                        </div>
                                        <div class="col-md-12">                                            
                                            <a href="#" class="btn btn-fill-out passwordbtn">{{__('lang.save')}}</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
					</div>
                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
						<div class="card">
                        	<div class="card-header">
                                <h3>{{__('lang.accountdetails')}}</h3>
                            </div>
                            <div class="card-body">
                                <form class="checkoutform" method="post">
                                    @csrf
                                    <div class="row">                                        
                                        <div class="form-group col-md-12">
                                        	<label>{{__('lang.entername')}} <span class="required">*</span></label>
                                            <input value="{{$user->name}}" required="" class="form-control" name="name" type="text">
                                        </div>
                                        <div class="form-group col-md-12">
                                        	<label>{{__('lang.phone')}} </label>
                                            <input value="{{$user->phone}}" required="" class="form-control phone" name="phone" type="text" placeholder="Telefon">
                                        </div>
                                        <div class="form-group col-md-12">
                                        	<label>{{__('lang.email')}} </label>
                                            <input disabled value="{{$user->email}}" required="" class="form-control" type="text" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-12">
                                        	<label>{{__('lang.address')}} </label>
                                            <input value="{{$user->address}}" required="" class="form-control" name="address" type="text">
                                        </div>
                                        <div class="form-group col-md-12">
                                        	<label>{{__('lang.city')}} </label>
                                            <input value="{{$user->city}}" required="" class="form-control" name="city" type="text">
                                        </div>
                                        <div class="form-group col-md-12">
                                        	<label>{{__('lang.postal')}} </label>
                                            <input value="{{$user->postal}}" required="" class="form-control postal" name="postal" type="text">
                                        </div>
                                        <div class="col-md-12">
                                            <a href="#" class="btn btn-fill-out accountbtn">{{__('lang.save')}}</a>
                                        </div>
                                    </div>
                                </form>
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
    $('.showorder').click('onclick',function(){


        var orderid = $(this).attr('data-orderid');

        
        $.ajax({
            type: 'post',
            url: baseurl+'/apiorderproducts',
            data: {'order_id':orderid},
            success: function(response) {
                var len = response.length;
                //console.log(response);
                var options = '<div class="table-responsive wishlist_table">' +
                                '<table class="table">' +
                                    '<thead>' +
                                        '<tr>' +
                                            '<th class="product-thumbnail"><?= json_encode(__("lang.image")); ?></th>' +
                                            '<th class="product-name"><?= json_encode(__('lang.product')); ?></th>' +
                                            '<th class="product-price"><?= json_encode(__('lang.price')); ?></th>' +
                                            '<th class="product-price"><?= json_encode(__('lang.quantity')); ?></th>' +
                                            '<th class="product-price"><?= json_encode(__('lang.total')); ?></th>' +
                                        '</tr>' +
                                    '</thead>' +
                                    '<tbody>';
                //var totalprice = 0;
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var title = response[i]['title_'+lang];
                    var image = response[i]['image'];
                    var price = response[i]['pivot']['product_price'];           
                    var quantity = response[i]['pivot']['quantity'];
                    var totalprice = quantity * price;
                    options +=  '<tr>' +
                                    '<td class="product-thumbnail"><a href="#"><img src="/storage/'+image+'" alt=""></a></td>' +
                                    '<td class="product-name" data-title="Product"><a href="#">'+title+'</a></td>' +
                                    '<td class="product-price" data-title="Price">'+price+' Azn </td>' +
                                    '<td class="product-price" data-title="Quantity">'+quantity+'</td>' +
                                    '<td class="product-price" data-title="Total">'+totalprice+' Azn </td>' +
                                '</tr>' ;   
                }                
                options +=  '</tbody>' +
                            '</table>' +
                            '</div>';
                Swal.fire({
                width:1200,
                showConfirmButton: false,
                showCloseButton: true,
                html:options,
                })
            },
            error: function(response) {                    
            }
        });



        // Swal.fire({
        // width:1200,
        // html:
        // '<div class="table-responsive wishlist_table">' +
        //     '<table class="table">' +
        //         '<thead>' +
        //             '<tr>' +
        //                 '<th class="product-thumbnail">&nbsp;</th>' +
        //                 '<th class="product-name">Product</th>' +
        //                 '<th class="product-price">Price</th>' +
        //                 '<th class="product-stock-status">Stock Status</th>' +
        //             '</tr>' +
        //         '</thead>' +
        //         '<tbody>' +
        //             '<tr>' +
        //                 '<td class="product-thumbnail"><a href="#"><img src="assets/images/product_img1.jpg" alt="product1"></a></td>' +
        //                 '<td class="product-name" data-title="Product"><a href="#">Blue Dress For Woman</a></td>' +
        //                 '<td class="product-price" data-title="Price">$45.00</td>' +
        //                 '<td class="product-stock-status" data-title="Stock Status"><span class="badge badge-pill badge-success">In Stock</span></td>' +
        //             '</tr>    ' +                        
        //         '</tbody>' +
        //     '</table>' +
        // '</div>',
        // })


    });



    $('.accountbtn').click('onclick',function(){
            $.ajax({
                type: 'post',
                url: baseurl+'/profile',
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
                        //$('.checkoutform')[0].reset();
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
    $('.passwordbtn').click('onclick',function(){
            $.ajax({
                type: 'post',
                url: baseurl+'/profilepassword',
                data: $('.passwordform').serialize(),
                success: function(response) {
                   // var len = response.length;
                    console.log(response);
                    if(response.statuscode == 200){
                        Swal.fire(
                        <?= json_encode(__('lang.success')); ?>,
                        <?= json_encode(__('lang.successorder')); ?>,
                        'success'
                        );
                    }else if(response.statuscode == 400){
                        Swal.fire(
                        <?= json_encode(__('lang.error')); ?>,
                        <?= json_encode(__('lang.errorfields')); ?>,
                        'error'
                        );
                    }else if(response.statuscode == 300){
                        Swal.fire(
                        <?= json_encode(__('lang.error')); ?>,
                        <?= json_encode(__('lang.errorsamepassword')); ?>,
                        'error'
                        );
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