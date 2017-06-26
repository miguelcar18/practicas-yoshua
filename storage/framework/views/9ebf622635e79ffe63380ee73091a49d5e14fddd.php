

<?php $__env->startSection('breadcrumbs'); ?>

<h5 class="breadcrumbs-title"><?php echo e(trans('messages.configuration')); ?></h5>
<ol class="breadcrumbs">
    <li><a href="home">Home</a></li>
     <li class="active"><?php echo e(trans('messages.configuration')); ?></li>
</ol>
<?php $__env->stopSection(); ?>
<!--<?php $__env->startSection('breadcrumb'); ?>  //barra navegacional
<div class="row">
    <ul class="breadcrumb">
                    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
                    <li class="active"><?php echo trans('messages.configuration'); ?></li>
                </ul>
</div>
        
<?php $__env->stopSection(); ?>
-->	
<?php $__env->startSection('content'); ?>


<div id="basic-tabs" class="section">

    <div class="col s12 m8 l9">

        <div class="row">
            <div class="col s12">
                <ul class="tabs tab-demo z-depth-1">
                    <li class="tab col s3"><a class="active" href="#general"><?php echo e(trans('messages.general')); ?></a>
                    </li>
                    <li class="tab col s3"><a href="#logo"><?php echo e(trans('messages.logo')); ?></a>
                    </li>
                    <li class="tab col s3"><a href="#system"><?php echo e(trans('messages.system')); ?></a>
                    </li>
                    <li class="tab col s3"><a href="#sms"><?php echo e('SMS'); ?></a>
                    </li>
                    <li class="tab col s3"><a href="#mail"><?php echo e(trans('messages.mail')); ?></a>
                    </li>
                    <li class="tab col s3"><a href="#authentication"> <?php echo e(trans('messages.authentication')); ?></a>
                    </li>
                    <li class="tab col s3"><a href="#social"><?php echo e(trans('messages.social').' '.trans('messages.login')); ?></a>
                    </li>

                </ul>
            </div>
            <div class="col s12">
                <div id="general" class="col s12">
                    <?php echo $__env->make('configuration._general_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div id="logo" class="col s12">

                    <?php echo $__env->make('configuration._logo_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div id="system" class="col s12">
                    <?php echo $__env->make('configuration._system_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                </div>
                <div id="sms" class="col s12">
                    <?php echo $__env->make('configuration._sms_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>

                <div id="mail" class="col s12">
                    <?php echo $__env->make('configuration._mail_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>

                <div id="authentication" class="col s12">
                    <?php echo $__env->make('configuration._auth_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    
                </div>
                <div id="social" class="col s12">
                    <?php echo $__env->make('configuration._social_login_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    
                </div>




            </div>
        </div>

    </div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.materialize.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>