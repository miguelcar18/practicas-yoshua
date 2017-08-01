<?php $__env->startSection('breadcrumbs'); ?>
<h5 class="breadcrumbs-title"><?php echo trans('messages.template'); ?></h5>
<ol class="breadcrumbs">
    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
    <li><a href="/template">IP<?php echo trans('messages.template'); ?></a></li>
    <li class=active"><a href="#">IP<?php echo trans('messages.edit'); ?></a></li>

</ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('common.materialize.header-form-link',['icon' => 'mdi-communication-email','url'=>'/template','buttonMessage'=>trans('messages.list_all'),'message'=>trans('messages.edit')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row">
    <div class="col s3">&nbsp;</div>
    <div class="col s12">

        <div class="card-panel center">
            <h4 class="header2"><?php echo trans('messages.edit').'  '.trans('messages.template'); ?></h4>

            <?php echo Form::model($template,['method' => 'PATCH','route' => ['template.update',$template] ,'class' => 'email-template-form','id' => 'email-template-form-edit','data-form-table' => 'template_table','data-submit' => 'noAjax']); ?>

            <div class="input-field col s12">
                <?php echo Form::label('subject',trans('messages.subject'),[]); ?>

                <?php echo Form::input('text','subject',isset($template->subject) ? $template->subject : '',['class'=>'form-control','placeholder'=>trans('messages.subject')]); ?>

            </div>

            <div class="input-field col s12">
                <?php echo Form::label('body',trans('messages.body'),[]); ?>

                <?php echo Form::textarea('body',isset($template->body) ? $template->body : '',['size' => '30x3', 'id'=>'editor1','class' => 'materialize-textarea', 'placeholder' => trans('messages.body')]); ?>

                

                



                <div class="help-block"><strong><?php echo trans('messages.available').' '.trans('messages.field'); ?></strong> : <?php echo ($template->is_default) ? config('template.'.$template->category.'.fields') : config('template-field.'.$template->category); ?> <br /> <?php echo e(trans('messages.template_field_instruction')); ?></div>
            </div>


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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.materialize.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>