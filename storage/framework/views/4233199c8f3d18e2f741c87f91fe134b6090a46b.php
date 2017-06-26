<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
   <?php echo e(csrf_field()); ?>

</form>
