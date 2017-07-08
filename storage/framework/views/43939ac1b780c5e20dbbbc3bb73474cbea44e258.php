<?php if(!getMode()): ?>
	<?php echo $__env->make('common.notification',['message' => 'You are free to perform all actions. The demo gets reset in every 30 minutes.' ,'type' => 'danger'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('common.notification',['message' => 'Launching Offer, Grab Larafy only at $14 before 5th October. Price from 6th October $34.' ,'type' => 'success'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>