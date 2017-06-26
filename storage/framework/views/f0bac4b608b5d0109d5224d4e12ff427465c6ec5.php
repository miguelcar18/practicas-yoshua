

<?php $__env->startSection('breadcrumbs'); ?>
<h5 class="breadcrumbs-title"><?php echo trans('messages.permission'); ?></h5>
<ol class="breadcrumbs">
    <li><a href="permission"><?php echo trans('messages.permission'); ?></a></li>
    <li><a href="#">Index</a></li>
    <li class="active"><?php echo trans('messages.permission'); ?></li>
</ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col s4">
        <div class="card-panel">
            <div>
                <h4 class="header2"><strong><?php echo trans('messages.add_new').'</strong> <strong>'.trans('messages.permission'); ?></strong></h4>
            </div>

            <?php echo Form::open(['route' => 'permission.store','role' => 'form', 'class'=>'permission-form','id' => 'permission-form','data-submit' => 'noAjax']); ?>

            <?php echo $__env->make('permission._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Form::close(); ?>

        </div>
    </div>


    <div class="col s8">
        <div class="card-panel">
            <strong><?php echo trans('messages.list_all').'</strong> '.trans('messages.permission'); ?>


            <div>
                <?php echo $__env->make('common.datatable',['table' => $table_data['permission-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <a href="/save-permission" class="btn waves-effect waves-light light-blue darken-4 right"><?php echo e(trans('messages.save').' '.trans('messages.permission')); ?></a>

                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.materialize.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>