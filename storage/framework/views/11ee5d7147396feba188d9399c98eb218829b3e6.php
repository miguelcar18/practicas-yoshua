<div class="col s12 m12 l12 ">
    <div class="card-panel">
        <h4 class="header2"><?php echo e(trans('messages.avatar')); ?></h4>
        <?php echo Form::model($user,['files' => true, 'method' => 'POST','route' => ['user.avatar',$user->id] ,'class' => 'user-avatar-form','id' => 'user-avatar-form','data-submit' => 'noAjax']); ?>

        <div class="row">
            <?php if($user->Profile->avatar && File::exists(config('constant.upload_path.avatar').$user->Profile->avatar)): ?>
            <div class="input-field col s7">
                <img src="<?php echo URL::to(config('constant.upload_path.avatar').$user->Profile->avatar); ?>" width="150px" style="margin-left:20px;">
                

                <?php endif; ?>


                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="avatar" id="avatar" title="<?php echo trans('messages.select').' '.trans('messages.avatar'); ?>" >
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

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