<?php $__env->startSection('content'); ?>
<form role="form" method="POST" action="<?php echo e(url('/user')); ?>" id="user-registration-form" >
    <?php echo e(csrf_field()); ?>


    
        <div class="row">
        <div class="input-field col s12 center">


            <?php if(config('config.logo') && File::exists(config('constant.upload_path.logo').config('config.logo'))): ?>
            <div class="logo text-center">
                <img src="/<?php echo config('constant.upload_path.logo').config('config.logo'); ?>" class="circle responsive-img valign profile-image-login" alt="Logo">
            </div>
            <?php endif; ?>
            <p class="center login-form-text">Material Design Admin Template</p>
</div></div>


       

    <?php echo $__env->make('auth._register_guest_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<div class="row">
        <div class="input-field col s12">

            <button type="submit" class="btn waves-effect waves-light light-blue darken-4 col s12"><?php echo trans('messages.register'); ?></button>
        </div>
    </div>

     
 
    


</div>

</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.materialize.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>