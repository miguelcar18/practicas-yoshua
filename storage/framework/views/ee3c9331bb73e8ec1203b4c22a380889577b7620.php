<?php $__env->startSection('breadcrumbs'); ?>

<h5 class="breadcrumbs-title">Home</h5>
<ol class="breadcrumbs">
    <li class="active">Home</li>
</ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
Contenido
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.materialize.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>