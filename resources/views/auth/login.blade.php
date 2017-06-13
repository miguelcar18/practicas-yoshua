@extends('layouts.materialize.guest')
@section('content')
<form role="form" action="{!! URL::to('/login') !!}" method="post" class="login-form" id="reset-password-form" data-submit="noAjax">
   
    {!! csrf_field() !!}
    <div class="row">
        <div class="input-field col s12 center">
            <!--<img src="./demo/images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">-->

            @if(config('config.logo') && File::exists(config('constant.upload_path.logo').config('config.logo')))
            <div class="logo text-center">
                <img src="/{!! config('constant.upload_path.logo').config('config.logo') !!}" class="circle responsive-img valign profile-image-login" alt="Logo">
            </div>
            @endif
            <p class="center login-form-text">Material Design Admin Template</p>



        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
           <!-- <input id="username" type="text">-->
            <input type="text" name="email" id="email">

            <label for="email" class="center-align">{!! trans('messages.email') !!}</label>
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <!--<input id="password" type="password" >-->
            <input type="password" name="password" id="password" >
            <label for="password">{!! trans('messages.password') !!}</label>

        </div>
    </div>
    <!--<div class="row">          
        <div class="input-field col s12 m12 l12  login-text">
            <input type="checkbox" id="remember-me" />
            <label for="remember-me">Remember me</label>
        </div>
    </div>-->
    <div class="row">
        <div class="input-field col s12">
            <!--<a href="index.html" class="btn waves-effect waves-light col s12">Login</a>-->
            <button type="submit" class="btn waves-effect waves-light col s12">{!! trans('messages.login') !!}</button>
        </div>
    </div>
    <!--<div class="row">
        <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="page-register.html">Register Now!</a></p>
        </div>-->

    @if(config('config.enable_user_registration'))
    <div class="row">
        <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"> <a href="/register">{!! trans('messages.create').' '.trans('messages.account') !!}?</a></p>
        </div>
    
    @endif

    <!--<div class="input-field col s6 m6 l6">
        <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
    </div> -->

    <div class="input-field col s6 m6 l6">
        @if(config('config.enable_forgot_password'))
        <p class="margin medium-small"><a href="/password/reset">{!! trans('messages.forgot').' '.trans('messages.password') !!}?</a></p>
        @endif
    </div>


</div>

</form>
@stop
