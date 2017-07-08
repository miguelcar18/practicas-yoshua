

<?php $__env->startSection('breadcrumbs'); ?>
<h5 class="breadcrumbs-title">User</h5>
<ol class="breadcrumbs">
    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
    <li><a href="/user"><?php echo trans('messages.user'); ?></a></li>
    <li class="active"><?php echo trans('messages.add_new').' '.trans('messages.user'); ?></li>
</ol>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('common.materialize.header-form-link',['icon' => 'mdi-image-timer-auto','url'=>'/user','buttonMessage'=>trans('messages.list_all'),'message'=>trans('messages.add_new')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::open(['route' => 'user.store','role' => 'form', 'class' => 'user-form','id' => "user-form"]); ?>

<?php echo $__env->make('auth._register_form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="input-field col s6">
    <button class="btn waves-effect waves-light light-blue darken-4 right" type="submit" name="action"><?php echo e(isset($buttonText) ? $buttonText : trans('messages.save')); ?>


    </button>
</div>
</div>

</div>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.materialize.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>