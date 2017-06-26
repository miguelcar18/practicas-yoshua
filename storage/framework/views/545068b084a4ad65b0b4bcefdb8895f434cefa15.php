

	<?php $__env->startSection('content'); ?>

        <div class="row">
            <div class="input-field col s12 center">

	                    <?php echo getAvatar(Auth::user()->id,150); ?>

                        <h3><strong><?php echo trans('messages.lock_screen'); ?></strong></h3>
                        <h4><strong><?php echo (config('config.login')) ? Auth::user()->email : Auth::user()->username; ?></strong></h4>
			</div>
		</div>

						<?php echo Form::open(['route' => 'unlock','role' => 'form', 'class'=>'unlock-form','id' => 'unlock-form','data-submit' => 'noAjax']); ?>

		<div class="row center">

				<div class="input-field col s12 center">
					<?php echo Form::input('password','password','',['class'=>'center']); ?>

					<?php echo Form::label('login',trans('messages.password'),['class'=>'center']); ?>

				</div>
		</div>
		<div class="row center">
				<div class="input-field col s12 center">
					<?php echo Form::submit(trans('messages.unlock'),['class' => 'btn waves-effect waves-ligth blue']); ?>

					<a href="#" class="btn waves-effect waves-ligth red" onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">Not <?php echo e(Auth::user()->full_name); ?>? Logout?</a>
				</div>
		</div>
		<?php echo Form::close(); ?>

<?php echo $__env->make('common.materialize.form-logout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.materialize.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>