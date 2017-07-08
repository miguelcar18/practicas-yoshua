<?php $__env->startSection('content'); ?>
<form role="form" action="<?php echo URL::to('/login'); ?>" method="post" class="login-form" id="reset-password-form" data-submit="noAjax">

    <?php echo csrf_field(); ?>

    <div class="row">
        <div class="input-field col s12 center">

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
            <?php if(config('config.login')): ?>
            <input type="text" name="email" id="email">
            <label for="email" class="center-align"><?php echo trans('messages.email'); ?></label>
            <?php else: ?>
            <input type="text" name="username" id="username">
            <label for="username" class="center-align"><?php echo trans('messages.username'); ?></label>
            <?php endif; ?>
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>

            <input type="password" name="password" id="password" >
            <label for="password"><?php echo trans('messages.password'); ?></label>

        </div>
    </div>
    <?php if(config('config.enable_remember_me')): ?>
    <div class="row">          
        <div class="input-field col s12">
            <input name="remember" id="remember" type="checkbox" class="checkbox-input" data-size="mini" data-on-text="Yes" data-off-text="No" value="1"> 
            <label for="remember"><?php echo trans('messages.remember_me'); ?></label>
        </div>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="input-field col s12">

            <button type="submit" class="btn waves-effect waves-light light-blue darken-4 col s12"><?php echo trans('messages.login'); ?></button>
        </div>
    </div>


    <?php if(config('config.enable_user_registration')): ?>
    <div class="row">
        <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"> <a href="/register"><?php echo trans('messages.create').' '.trans('messages.account'); ?>?</a></p>
        </div>

        <?php endif; ?>



        <div class="input-field col s6 m6 l6">
            <?php if(config('config.enable_forgot_password')): ?>
            <p class="margin medium-small"><a href="/password/reset"><?php echo trans('messages.forgot').' '.trans('messages.password'); ?>?</a></p>
            <?php endif; ?>
        </div>


    </div>

</form>

<?php if(config('config.enable_social_login')): ?>
<hr class="login-social-or"/>
<div class="text-center">
    {-- <p style="font-weight:bold;">Or</p>--}}
    <?php $__currentLoopData = config('constant.social_login_provider'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(config('config.enable_'.$provider.'_login')): ?>
    <a class="btn waves-effect waves-light light-blue darken-4 btn-<?php echo e($provider.(($provider == 'google') ? '-plus' : '')); ?>" href="/auth/<?php echo e($provider); ?>">
        <i class="fa fa-<?php echo e($provider); ?>"></i> <?php echo e(toWord($provider)); ?>

    </a>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.materialize.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>