<div class="row">

	 <div class="input-field">

	    <?php echo Form::select('category', $category, '',[]); ?>

	     <?php echo Form::label('category',trans('messages.category'),[]); ?>

	 </div>
	<div class="input-field">

		<?php echo Form::input('text','name','',[]); ?>

		<?php echo Form::label('name',trans('messages.name'),[]); ?>

	</div>
</div>