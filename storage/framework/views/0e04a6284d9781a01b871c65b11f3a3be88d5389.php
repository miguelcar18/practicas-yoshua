<?php $__env->startSection('content'); ?>
<form role="form" action="<?php echo URL::to('/password/reset'); ?>" method="post" class="login-form" id="reset-password-form" data-submit="noAjax">
    <input type="hidden" name="token" value="<?php echo e($token); ?>">
    <?php echo csrf_field(); ?>

    <div class="row">
        <div class="input-field col s12 center">
            <!--<img src="./demo/images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">-->

            <?php if(config('config.logo') && File::exists(config('constant.upload_path.logo').config('config.logo'))): ?>
            <div class="logo text-center">
                <img src="/<?php echo config('constant.upload_path.logo').config('config.logo'); ?>" class="circle responsive-img valign profile-image-login" alt="Logo">
            </div>
            <?php endif; ?>
            <p class="center login-form-text">Material Design Admin Template</p>



        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
           <!-- <input id="username" type="text">-->
            <input type="text" name="email" id="email">

            <label for="email" class="center-align"><?php echo trans('messages.email'); ?></label>
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <!--<input id="password" type="password" >-->
            <input type="password" name="password" id="password" text-input <?php echo e((config('config.enable_password_strength_meter') ? 'password-strength' : '')); ?>" ') !!}">
                   <label for="password"><?php echo trans('messages.password'); ?></label>

        </div>
    </div>

    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <!--<input id="password" type="password" >-->
            <input type="password" name="password_confirmation" id="password_confirmation" >
            <label for="password"><?php echo trans('messages.password'); ?></label>

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
            <button type="submit" class="btn waves-effect waves-light col s12"><?php echo trans('messages.reset').' '.trans('messages.password'); ?></button>
        </div>
    </div>
    <!--<div class="row">
        <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="page-register.html">Register Now!</a></p>
        </div>-->

    </div>

</form>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.materialize.guest', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>