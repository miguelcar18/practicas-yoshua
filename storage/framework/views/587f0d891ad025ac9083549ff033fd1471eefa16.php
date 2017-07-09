

<?php $__env->startSection('breadcrumbs'); ?>
<h5 class="breadcrumbs-title">Show</h5>
<ul class="breadcrumbs">
    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
    <li><a href="/user"><?php echo trans('messages.user'); ?></a></li>
    <li class="active"><?php echo $user->full_name; ?></li>
</ul>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('common.materialize.header-form-link',['icon' => 'mdi-image-timer-auto','url'=>'/user','buttonMessage'=>trans('messages.list_all'),'message'=>''], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row">
    <div class="col s5 ">
        <div class="card-panel col s12">
            <h4 class="header2"><strong><?php echo trans('messages.user').'</strong> '.trans('messages.profile'); ?></h4>
            <div class="row">
                <form >
                    <div class="row col s12">
                        <div class="input-field col s12 center">
                            <div style="margin-top:20px;margin-bottom:20px;"><?php echo getAvatar($user->id,150); ?></div>
                        </div>
                        <table class="bordered responsive-table" >
                            <tbody>
                                <tr>
                                    <th><?php echo e(trans('messages.name')); ?></th>
                                    <td><?php echo e($user->full_name); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(trans('messages.status')); ?></th>
                                    <td><?php echo e(toWord($user->status)); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(trans('messages.role')); ?></th>
                                    <td>
                                        <?php $__currentLoopData = $user->Roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e(ucfirst($role->name)); ?><br />
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(trans('messages.email')); ?></th>
                                    <td><?php echo e($user->email); ?></td>
                                </tr>
                                <?php if(!config('config.login')): ?>
                                <tr>
                                    <th><?php echo e(trans('messages.username')); ?></th>
                                    <td><?php echo e($user->username); ?></td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th><?php echo e(trans('messages.signup').' '.trans('messages.date')); ?></th>
                                    <td><?php echo e(showDate($user->created_at)); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(trans('messages.last').' '.trans('messages.login')); ?></th>
                                    <td><?php echo e(showDateTime($user->last_login)); ?></td>
                                </tr>
                            </tbody>
                        </table>


                        <div class="row">
                            <div class="input-field col s8">
                                <?php if($user->id== Auth::user()->id): ?>
                                <a href="#modal1" class=" btn modal-trigger  waves-effect waves-light light-blue darken-4 left"><?php echo e(trans('messages.change').' '.trans('messages.password')); ?></a>
                                <?php endif; ?>
                            </div>



                            <div class="input-field col 4">
                                <a href="#" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="btn red waves-effect waves-light right"><?php echo e(trans('messages.logout')); ?></a>
                            </div>

                        </div>
                        <p></p>
                    </div>
                </form>



            </div>
        </div>
    </div>




    <!--tab-->
    <div class="col s7  left">
        <div class="card-panel">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs tab-demo z-depth-1">
                        <li class="tab col s3"><a class="active" href="#general"><?php echo e(trans('messages.general')); ?></a>
                        </li>
                        <li class="tab col s3"><a href="#avatar-tab"><?php echo e(trans('messages.avatar')); ?></a>
                        </li>
                        <li class="tab col s3"><a href="#social_tab"><?php echo e(trans('messages.social').' '.trans('messages.networking')); ?></a>
                        </li>
                        <?php if($user->id != Auth::user()->id): ?>
                        <li class="tab col s3"><a href="#password"><?php echo e(trans('messages.password')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if(config('config.enable_email_template')): ?>
                        <li class="tab col s3"><a href="#mail"><?php echo e(trans('messages.mail')); ?></a>
                        </li>
                        <?php endif; ?>

                    </ul>
                </div>
                <div class="col s12">
                    <div id="general" class="col s12">

                        <div class="panel-body">
                            <?php echo Form::model($user,['method' => 'POST','route' => ['user.profile-update',$user->id] ,'class' => 'user-profile-form','id' => 'user-profile-form','data-no-form-clear' => 1]); ?>

                            <div class="row">

                                <?php echo $__env->make('user.common.general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            </div>
                            <!-- avatar-->
                            <div id="avatar-tab" class="col s12">

                                <?php echo $__env->make('user.common.avatar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            </div>
                            <!-- avatar-->
                            <div id="social_tab" class="col s12">
                                <?php echo $__env->make('user.common.social_networking', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            </div>

                            <?php if($user->id != Auth::user()->id): ?>
                            <div id="password" class="col s12">
                                <?php echo $__env->make('user.common.password', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                            <?php endif; ?>

                            <?php if(config('config.enable_email_template')): ?>
                            <div id="mail" class="col s12">
                                <?php echo $__env->make('user.common.mail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            </div>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <?php echo $__env->make('auth.change_password', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>

  
<?php echo $__env->make('layouts.materialize.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>