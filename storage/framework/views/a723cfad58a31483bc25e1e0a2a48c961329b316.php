

<?php $__env->startSection('breadcrumbs'); ?>
<h5 class="breadcrumbs-title">IP<?php echo trans('messages.filter'); ?></h5>
<ol class="breadcrumbs">
	<li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
    <li><a href="/ip-filter">IP<?php echo trans('messages.filter'); ?></a></li>
    <li class=active"><a href="#">IP<?php echo trans('messages.edit'); ?></a></li>

</ol>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('common.materialize.header-form-link',['icon' => 'mdi-notification-vpn-lock','url'=>'/ip-filter','buttonMessage'=>trans('messages.list_all'),'message'=>trans('messages.edit')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col s3">&nbsp;</div>
    <div class="col s6">

        <div class="card-panel center">
            <h4 class="header2"><?php echo trans('messages.edit').' IP '.trans('messages.filter'); ?></h4>

            <div class="modal-body">
                <?php echo Form::model($ip_filter,['method' => 'PATCH','route' => ['ip-filter.update',$ip_filter->id] ,'class' => 'ip-filter-form','id' => 'ip-filter-form-edit']); ?>

				<?php echo $__env->make('ip_filter._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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