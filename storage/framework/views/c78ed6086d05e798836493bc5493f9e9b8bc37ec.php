<?php $__env->startSection('breadcrumbs'); ?>
<h5 class="breadcrumbs-title"><?php echo trans('messages.language'); ?></h5>
<ul class="breadcrumbs">
    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
    <li class="active"><?php echo config('lang.'.$locale.'.language'); ?></li>
</ul>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('common.materialize.header-form-link',['icon' => 'mdi-action-language','url'=>'/language','buttonMessage'=>trans('messages.list_all'),'message'=>trans('messages.language')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="col s12 m8 l9">
    <div class="row">
        <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
            <li> <div class="collapsible-header "><?php echo e(trans('messages.plugin')); ?></div>
                <div class="collapsible-body">

                    <div class="row col s12" >
                        <?php echo Form::model($language,['method' => 'PATCH','route' => ['language.plugin',$locale] ,'class' => 'language-plugin-form','id'=>'language-plugin-form','data-no-form-clear' => 1]); ?>

                        <div class="row">
                            <div class="input-field col s6">
                                <?php echo Form::select('datatable', config('lang_datatable'),isset($locale) ? config('lang.'.$locale.'.datatable') : '',['title'=>trans('messages.select_one')]); ?>

                                <?php echo Form::label('datatable',trans('messages.table').' '.trans('messages.language'),[]); ?>

                            </div>
                            <div class="input-field col s6">
                                <?php echo Form::select('calendar', config('lang_calendar'),isset($locale) ? config('lang.'.$locale.'.calendar') : '',['title'=>trans('messages.select_one')]); ?>

                                <?php echo Form::label('calendar',trans('messages.calendar').' '.trans('messages.language'),[]); ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <?php echo Form::select('datepicker', config('lang_datepicker'),isset($locale) ? config('lang.'.$locale.'.datepicker') : '',['title'=>trans('messages.select_one')]); ?>

                                <?php echo Form::label('datepicker',trans('messages.datepicker').' '.trans('messages.language'),[]); ?>

                            </div>
                            <div class="input-field col s6">
                                <?php echo Form::select('datetimepicker', config('lang_datetimepicker'),isset($locale) ? config('lang.'.$locale.'.datetimepicker') : '',['title'=>trans('messages.select_one')]); ?>

                                <?php echo Form::label('datetimepicker',trans('messages.datetimepicker').' '.trans('messages.language'),[]); ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <?php echo Form::select('validation', config('lang_validation'),isset($locale) ? config('lang.'.$locale.'.validation') : '',['title'=>trans('messages.select_one')]); ?>

                                <?php echo Form::label('validation',trans('messages.validation').' '.trans('messages.language'),[]); ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light light-blue darken-4 right" type="submit" name="action"><?php echo e(isset($buttonText) ? $buttonText : trans('messages.save')); ?>


                                </button>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>


                </div>
            </li>

            <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <div class="collapsible-header "><?php echo trans('messages.'.$module); ?> (<?php echo e($word_count[$module]); ?>)</div>
                <div class="collapsible-body">
                    <div class="row col s12">

                        <strong><?php echo e(trans('messages.'.$module)); ?></strong> <?php echo e(trans('messages.translation')); ?>


                        <?php echo Form::model($language,['method' => 'PATCH','route' => ['language.update-translation',$locale] ,'class' => 'form-horizontal','id'=>'language_translation_'.$module, 'data-no-form-clear' => 1]); ?>

                        <?php $__currentLoopData = $words; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $word): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($word['module'] == $module): ?>
                        <div class="input-field col s6">
                            <?php echo Form::label($key,$word['value'],['class'=>'col-sm-6 control-label pull-left']); ?>

                           
                                <?php if($locale == 'en'): ?>
                                <?php echo Form::input('text',$key,(array_key_exists($key, $translation)) ? $translation[$key] : $word['value'],['class'=>'form-control','placeholder'=>trans('messages.translation')]); ?>

                                <?php else: ?>
                                <?php echo Form::input('text',$key,(array_key_exists($key, $translation)) ? $translation[$key] : '',['class'=>'form-control','placeholder'=>trans('messages.translation')]); ?>

                                <?php endif; ?>
                             <?php echo Form::label($key,$word['value'],[]); ?>

                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo Form::hidden('module',$module); ?>

                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light light-blue darken-4 right" type="submit" name="action"><?php echo e(isset($buttonText) ? $buttonText : trans('messages.save')); ?>


                                </button>
                            </div>
                        </div>

                        <?php echo Form::close(); ?>



                    </div>


                </div>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
    </div>
</div>











<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.materialize.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>