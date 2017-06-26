

<?php $__env->startSection('breadcrumbs'); ?>
<h5 class="breadcrumbs-title"><?php echo trans('messages.home'); ?></h5>
<ol class="breadcrumbs">
	<li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
    <li class=active"><a href="#"><?php echo trans('messages.activity').' '.trans('messages.log'); ?></a></li>

</ol>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

	<div class="row">
    <div class="col s12">
        <div class="card-panel">
            <h4 class="header2"><strong><?php echo trans('messages.list_all').'</strong> '.trans('messages.activity').' '.trans('messages.log'); ?></h4>

            <div>
                <?php echo $__env->make('common.datatable',['table' => $table_data['activity-log-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

            <div class="row">


            </div>
        </div>
    </div>

		</div>
	<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.materialize.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>