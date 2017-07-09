

<?php $__env->startSection('breadcrumbs'); ?>
<h5 class="breadcrumbs-title"><?php echo trans('messages.permission'); ?></h5>
<ol class="breadcrumbs">
    <li><a href="home"><?php echo trans('messages.home'); ?></a></li>
    <li><a href="role"><?php echo trans('messages.role'); ?></a></li>
    <li class="active"><a href="#">Index</a></li>

</ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col s4">
        <div class="card-panel">
            <div>
                <h4 class="header2"><strong><?php echo trans('messages.add_new').'</strong> <strong>'.trans('messages.role'); ?></strong></h4>
            </div>

            <?php echo Form::open(['route' => 'role.store','role' => 'form', 'class'=>'role-form','id' => 'role-form' ]); ?>

                <?php echo $__env->make('role._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light light-blue darken-4 right" type="submit" name="action"><?php echo e(isset($buttonText) ? $buttonText : trans('messages.save')); ?>

                    </button>
                </div>

            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>



    <div class="col s8">
        <div class="card-panel">
            <h4 class="header2"><strong><?php echo trans('messages.list_all').'</strong> '.trans('messages.role'); ?></h4>

            <div>
                <?php echo $__env->make('common.materialize.datatable',['table' => $table_data['role-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <div class="row">


            </div>
        </div>
    </div>



</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.materialize.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>