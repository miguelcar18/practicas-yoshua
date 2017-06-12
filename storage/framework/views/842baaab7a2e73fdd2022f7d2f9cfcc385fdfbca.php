

	<?php $__env->startSection('breadcrumb'); ?>
		<div class="row">
			<ul class="breadcrumb">
			    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
			    <li><a href="/language"><?php echo trans('messages.language'); ?></a></li>
			    <li class="active"><?php echo config('lang.'.$locale.'.language'); ?></li>
			</ul>
		</div>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-xs-2">
			    <ul class="nav nav-tabs tabs-left">
			      <li class="active"><a href="#plugin" data-toggle="tab"><?php echo e(trans('messages.plugin')); ?></a></li>
			      <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  	<li><a href="#_<?php echo e($module); ?>" data-toggle="tab"> <?php echo trans('messages.'.$module); ?> (<?php echo e($word_count[$module]); ?>)</a></li>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    </ul>
			</div>
			<div class="col-xs-10">
			    <div class="tab-content">
			      	<div class="tab-pane active" id="plugin">
						<div class="panel panel-default">
							<div class="panel-heading">
                    			<strong><?php echo trans('messages.plugin'); ?></strong>
                    		</div>
                    		<div class="panel-body">
						    	<?php echo Form::model($language,['method' => 'PATCH','route' => ['language.plugin',$locale] ,'class' => 'language-plugin-form','id'=>'language-plugin-form','data-no-form-clear' => 1]); ?>

								  <div class="form-group">
								    <?php echo Form::label('datatable',trans('messages.table').' '.trans('messages.language'),[]); ?>

									<?php echo Form::select('datatable', config('lang_datatable'),isset($locale) ? config('lang.'.$locale.'.datatable') : '',['class'=>'form-control input-xlarge show-tick','title'=>trans('messages.select_one')]); ?>

								  </div>
								  <div class="form-group">
								    <?php echo Form::label('calendar',trans('messages.calendar').' '.trans('messages.language'),[]); ?>

									<?php echo Form::select('calendar', config('lang_calendar'),isset($locale) ? config('lang.'.$locale.'.calendar') : '',['class'=>'form-control input-xlarge show-tick','title'=>trans('messages.select_one')]); ?>

								  </div>
								  <div class="form-group">
								    <?php echo Form::label('datepicker',trans('messages.datepicker').' '.trans('messages.language'),[]); ?>

									<?php echo Form::select('datepicker', config('lang_datepicker'),isset($locale) ? config('lang.'.$locale.'.datepicker') : '',['class'=>'form-control input-xlarge show-tick','title'=>trans('messages.select_one')]); ?>

								  </div>
								  <div class="form-group">
								    <?php echo Form::label('datetimepicker',trans('messages.datetimepicker').' '.trans('messages.language'),[]); ?>

									<?php echo Form::select('datetimepicker', config('lang_datetimepicker'),isset($locale) ? config('lang.'.$locale.'.datetimepicker') : '',['class'=>'form-control input-xlarge show-tick','title'=>trans('messages.select_one')]); ?>

								  </div>
								  <div class="form-group">
								    <?php echo Form::label('validation',trans('messages.validation').' '.trans('messages.language'),[]); ?>

									<?php echo Form::select('validation', config('lang_validation'),isset($locale) ? config('lang.'.$locale.'.validation') : '',['class'=>'form-control input-xlarge show-tick','title'=>trans('messages.select_one')]); ?>

								  </div>
								<?php echo Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>

								<?php echo Form::close(); ?>

                    		</div>
                    	</div>
                    </div>
			      <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="tab-pane" id="_<?php echo e($module); ?>">
						<div class="panel panel-default">
                    		<div class="panel-heading">
                    			<strong><?php echo e(trans('messages.'.$module)); ?></strong> <?php echo e(trans('messages.translation')); ?>

                    		</div>
                    		<div class="panel-body">
					    		<?php echo Form::model($language,['method' => 'PATCH','route' => ['language.update-translation',$locale] ,'class' => 'form-horizontal','id'=>'language_translation_'.$module, 'data-no-form-clear' => 1]); ?>

								<?php $__currentLoopData = $words; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $word): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($word['module'] == $module): ?>
									<div class="form-group">
								    	<?php echo Form::label($key,$word['value'],['class'=>'col-sm-6 control-label pull-left']); ?>

										<div class="col-sm-6">
											<?php if($locale == 'en'): ?>
											<?php echo Form::input('text',$key,(array_key_exists($key, $translation)) ? $translation[$key] : $word['value'],['class'=>'form-control','placeholder'=>trans('messages.translation')]); ?>

											<?php else: ?>
											<?php echo Form::input('text',$key,(array_key_exists($key, $translation)) ? $translation[$key] : '',['class'=>'form-control','placeholder'=>trans('messages.translation')]); ?>

											<?php endif; ?>
										</div>
								  	</div>
								  	<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php echo Form::hidden('module',$module); ?>

								<?php echo Form::submit(trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>

								<?php echo Form::close(); ?>

                    		</div>
                    	</div>
					</div>
				  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    </div>
			</div>  
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>