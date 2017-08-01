<?php $__env->startSection('breadcrumbs'); ?>
<h5 class="breadcrumbs-title">User</h5>
<ol class="breadcrumbs">
    <li><a href="user">User</a></li>
    <li><a href="#">Index</a></li>
    <li class="active">User</li>
</ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('common.materialize.header-form-link',['icon' => 'mdi-image-timer-auto','url'=>'user/create','buttonMessage'=>trans('messages.add_new'),'message'=>''], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('common.materialize.datatable',['table' => $table_data['user-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.materialize.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>