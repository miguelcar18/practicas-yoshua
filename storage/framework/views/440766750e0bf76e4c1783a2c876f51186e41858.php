

<?php $__env->startSection('breadcrumbs'); ?>
<h5 class="breadcrumbs-title"><?php echo trans('messages.language'); ?></h5>
<ul class="breadcrumbs">
    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
    <li class="active"><?php echo trans('messages.language'); ?></a></li>
</ul>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="row col s4">
        <div class="card-panel col s12">
            <h4 class="header2"><strong><?php echo trans('messages.add_new'); ?></strong> <?php echo trans('messages.word'); ?></h4>

            <?php echo Form::open(['route' => 'language.add-words','role' => 'form', 'class'=>'language-entry-form','id' => 'language-entry-form','data-submit' => 'noAjax']); ?>


            <div class="input-field col s12">
                <?php echo Form::label('text',trans('messages.key'),[]); ?>

                <?php echo Form::input('text','key','',['class'=>'form-control','placeholder'=>trans('messages.key')]); ?>

            </div>
            <div class="input-field col s12">
                <?php echo Form::label('text',trans('messages.word_or_sentence'),[]); ?>

                <?php echo Form::input('text','text','',['class'=>'form-control','placeholder'=>trans('messages.word_or_sentence')]); ?>

            </div>
            <div class="input-field col s12">
                <?php echo Form::label('module',trans('messages.module'),[]); ?>

                <?php echo Form::input('text','module','',['class'=>'form-control','placeholder'=>trans('messages.module')]); ?>

            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light light-blue darken-4 right" type="submit" name="action"><?php echo e(isset($buttonText) ? $buttonText : trans('messages.save')); ?>

                    </button>
                </div>
            </div>

            <p></p>
            <?php echo Form::close(); ?>


        </div>

        <div class="card-panel col s12">
            <h4 class="header2"><strong><?php echo trans('messages.add_new'); ?></strong> <?php echo trans('messages.language'); ?></h4>

            <?php echo Form::open(['route' => 'language.store','role' => 'form', 'class'=>'language-form','id' => 'language-form' ,'data-submit' => 'noAjax']); ?>

            <?php echo $__env->make('language._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light light-blue darken-4 right" type="submit" name="action"><?php echo e(isset($buttonText) ? $buttonText : trans('messages.save')); ?>

                    </button>
                </div>
            </div>
            <p></p>
            <?php echo Form::close(); ?>

        </div>


    </div>    
    <div class="row col s8">    

        <div class="card-panel col s12">

            <h4 class="header2"><strong><?php echo trans('messages.list_all'); ?></strong> <?php echo trans('messages.language'); ?></h4>

      
            <div>
                <?php echo $__env->make('common.materialize.datatable',['table' => $table_data['language-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>

    </div>
</div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.materialize.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>