<?php $__env->startSection('content'); ?>
<form role="form" action="<?php echo URL::to('/password/email'); ?>" method="post" class="forgot-form" id="forgot-form" data-submit="noAjax">
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
           <!-- <input id="username" type="text">-->
            <input type="email" name="email" id="email">
            <label for="email" class="center-align"><?php echo trans('messages.email'); ?></label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light light-blue darken-4 col s12"><?php echo trans('messages.reset').' '.trans('messages.password'); ?></button>

        </div>
    </div>



</div>

</form>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.materialize.guest', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>