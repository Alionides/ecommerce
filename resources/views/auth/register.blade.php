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
                            <h3>{{__('lang.createaccount')}}</h3>
                        </div>
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="/{{ Config('app.locale') }}/register">
                            @csrf
                            <div class="form-group">
                                {{-- <input type="text" required="" class="form-control" name="email" placeholder="Your Email"> --}}                                
                                <x-jet-input id="name" class="form-control block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="{{__('lang.entername')}}"/>
                            </div>
                            <div class="form-group">
                                {{-- <input type="text" required="" class="form-control" name="email" placeholder="Your Email"> --}}                                
                                <x-jet-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="{{__('lang.enteremail')}}"/>
                            </div>
                            <div class="form-group">
                                {{-- <input class="form-control" required="" type="password" name="password" placeholder="Password"> --}}
                                <x-jet-input id="password" class="form-control block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="{{__('lang.newpassword')}}"/>
                            </div>
                            <div class="form-group">
                                {{-- <input class="form-control" required="" type="password" name="password" placeholder="Password"> --}}
                                <x-jet-input id="password_confirmation" class="form-control block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{__('lang.confirmpassword')}}"/>
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        {{-- <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value=""> --}}
                                        {{-- <input class="form-check-input form-checkbox" id="exampleCheckbox1" type="checkbox" name="remember">

                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label> --}}
                                    </div>
                                </div>
                                {{-- <a href="#">Forgot password?</a> --}}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">{{__('lang.registernow')}}</button>
                            </div>
                        </form>
                        <div class="different_login">
                            <span> or</span>
                        </div>
                        <ul class="btn-login list_none text-center">
                            <li><a href="/{{ Config('app.locale') }}/auth/facebook" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                            <li><a href="/{{ Config('app.locale') }}/auth/google" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                        </ul>
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

