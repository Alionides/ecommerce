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
                    <li class="breadcrumb-item active"><a href="#">{{__('lang.contact')}}</a></li>
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
<!-- START SECTION CONTACT -->
<div class="section pb_70">
	<div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-map2"></i>
                    </div>
                    <div class="contact_text">
                        <span>{{__('lang.address')}}</span>
                        <p>{{__('lang.addresstxt')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-envelope-open"></i>
                    </div>
                    <div class="contact_text">
                        <span>{{__('lang.email')}}</span>
                        <a href="mailto:info@alisveris.com">info@alisveris.com </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-tablet2"></i>
                    </div>
                    <div class="contact_text">
                        <span>{{__('lang.phone')}}</span>
                        <p>+ 994 70 412 55 44</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

<!-- START SECTION CONTACT -->
<div class="section pt-0">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-6">
            	<div class="heading_s1">
                	<h2>{{__('lang.writeus')}}</h2>
                </div>
                <p class="leads">{{__('lang.writeustxt')}}</p>
                <div class="field_form">
                    <form action="" method="post" class="contact">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input required placeholder="{{__('lang.entername')}} *" id="p_name" class="form-control" name="name" type="text">
                             </div>
                            <div class="form-group col-md-6">
                                <input required placeholder="{{__('lang.enteremail')}} *" id="p_email" class="form-control" name="email" type="email">
                            </div>
                            <div class="form-group col-md-6">
                                <input required placeholder="{{__('lang.enterphone')}} *" id="p_phone" class="form-control" name="phone">
                            </div>
                            <div class="form-group col-md-6">
                                <input placeholder="{{__('lang.entersubject')}}" id="p_subject" class="form-control" name="subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea required placeholder="{{__('lang.entermessage')}} *" id="p_message"  class="form-control" name="message" rows="4"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" title="{{__('lang.send')}}" class="btn btn-fill-out" id="submitButton" name="submit" value="Submit">{{__('lang.send')}}</button>
                            </div>
                            <div class="col-md-12">
                                <div id="alert-msg" class="alert-msg text-center"></div>
                            </div>
                        </div>
                    </form>		
                </div>
            </div>
            <div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
            	<div id="map" class="contact_map2" data-zoom="12" data-latitude="40.382160" data-longitude="49.839140" data-icon="/assets/images/marker.png"></div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

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
    
    $('form.contact:first').on('submit', function(e) {
        
        e.preventDefault();

        resetErrors();

        var $this = $(this);

        $.ajax({
            type: $this.attr('method'),
            url: '/az/contact', //$this.attr('action'),
            data: $this.serializeArray(),
            dataType: $this.data('type'),
            success: function(response) {
                if (response.success) {
                    Swal.fire('Uğurlu!', response.message, 'success');
                    $('#p_name').val('');
                    $('#p_email').val('');
                    $('#p_subject').val('');
                    $('#p_phone').val('');
                    $('#p_message').val('');
                }
            },
            error: function(response) {
                if (response.status == 422) {
                    var errors = response.responseJSON.errors;

                    $.each(errors, function(i, v) {
                        var msg = '<label class="error" for="' + i + '">' + v + '</label>';
                        $('' +
                            'form.contact input[name="' + i + '"], ' +
                            'form.contact select[name="' + i + '"], ' +
                            'form.contact textarea[name="' + i + '"]').addClass('inputTxtError').after(msg);
                    });
                    var keys = Object.keys(errors);

                    $('form.login input[name="' + keys[0] + '"]').focus();
                }
            }
        });
    });

    function resetErrors() {
        $('form input, form select').removeClass('inputTxtError');
        $('label.error').remove();
    }

</script>
@endsection

@section('css')
<style>
</style>
@endsection