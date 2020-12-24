@extends('layouts.app')
@section('content')

<!-- START LOGIN SECTION -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>{{__('lang.forgotpassword')}}</h3>
                        </div>
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="/{{ Config('app.locale') }}/forgot-password">
                            @csrf
                            <div class="form-group">
                                {{-- <input type="text" required="" class="form-control" name="email" placeholder="Your Email"> --}}                                
                                <x-jet-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="{{__('lang.enteremail')}}"/>
                            </div>  
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">{{__('lang.send')}}</button>
                            </div>
                        </form>
                        <div class="different_login">
                            <span> or</span>
                        </div>
                        <div class="form-note text-center">{{__('lang.donthaveaccount')}} <a href="/{{ Config('app.locale') }}/register">{{__('lang.registernow')}}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->

@endsection

@section('js')
<script>
</script>
@endsection

@section('css')
<style>
</style>
@endsection

