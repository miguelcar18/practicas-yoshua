

<?php $__env->startSection('breadcrumbs'); ?>
<h5 class="breadcrumbs-title"><?php echo trans('messages.permission'); ?></h5>
<ol class="breadcrumbs">
    <li><a href="permission"><?php echo trans('messages.permission'); ?></a></li>
    <li><a href="#">Edit</a></li>
    <li class="active"><?php echo trans('messages.permission'); ?></li>
</ol>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('common.materialize.header-form-link',['icon' => 'mdi-notification-vpn-lock','url'=>'/permission','buttonMessage'=>trans('messages.list_all'),'message'=>trans('messages.edit')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col s3">&nbsp;</div>
    <div class="col s6">

        <div class="card-panel center">
            <h4 class="header2"><?php echo trans('messages.edit').' '.trans('messages.permission'); ?></h4>

            <div class="modal-body">
                <?php echo Form::model($permission,['method' => 'PATCH','route' => ['permission.update',$permission->id] ,'class' => 'permission-form','data-submit'=>'noAjax','id' => 'permission-form-edit']); ?>

                <?php echo $__env->make('permission._form', ['buttonText' => trans('messages.update')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light light-blue darken-4 right" type="submit" name="action"><?php echo e(isset($buttonText) ? $buttonText : trans('messages.save')); ?>

                        </button>
                    </div>

                </div>
                <?php echo Form::close(); ?>


            </div>
        </div>
    </div>
    <div class="col s3">&nbsp;</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.materialize.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>