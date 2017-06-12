    <?php $__env->startSection('content'); ?>
    <div class="container">

        <?php if(config('config.logo') && File::exists(config('constant.upload_path.logo').config('config.logo'))): ?>
            <div class="logo text-center">
                <img src="/<?php echo config('constant.upload_path.logo').config('config.logo'); ?>" class="logo-image" alt="Logo">
            </div>
        <?php endif; ?>

        <?php if(!getMode()): ?>
            <?php echo $__env->make('common.notification',['message' => 'You are free to perform all actions. The demo gets reset in every 30 minutes.' ,'type' => 'danger'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('common.notification',['message' => 'Launching Offer, Grab Larafy only at $14 before 5th October. Price from 6th October $34.' ,'type' => 'success'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong><?php echo trans('messages.user'); ?></strong> <?php echo trans('messages.login'); ?></h3>
                    </div>
                    <div class="panel-body">
                    <?php if(!getMode()): ?>
                    <div class="row" style="margin-bottom: 15px;">
                        <h4 class="text-center">For Demo Purpose</h4>
                        <div class="col-md-6">
                            <a href="#" data-username="admin" data-email="support@wmlab.in" data-password="123456" class="btn btn-block btn-primary login-as">Login as Admin</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" data-username="user" data-email="accounts@wmlab.in" data-password="123456" class="btn btn-block btn-danger login-as">Login as User</a>
                        </div>
                    </div>
                    <?php endif; ?>
                        <form role="form" action="<?php echo URL::to('/login'); ?>" method="post" class="login-form" id="login-form" data-submit="noAjax">
                            <?php echo csrf_field(); ?>

                            <fieldset>
                                <?php if(config('config.login')): ?>
                                <div class="form-group">
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="<?php echo trans('messages.email'); ?>">
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="form-group">
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="<?php echo trans('messages.username'); ?>">
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo trans('messages.password'); ?>">
                                    </div>
                                </div>
                                <?php if(config('config.enable_remember_me')): ?>
                                <div class="form-group">
                                    <input name="remember" type="checkbox" class="switch-input" data-size="mini" data-on-text="Yes" data-off-text="No" value="1"> <?php echo trans('messages.remember_me'); ?>

                                </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-block btn-success"><?php echo trans('messages.login'); ?></button>
                                        </div>
                                        <div class="col-md-6">
                                            <?php if(config('config.enable_forgot_password')): ?>
                                            <a href="/password/reset" class="btn btn-block btn-info"><?php echo trans('messages.forgot').' '.trans('messages.password'); ?>?</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if(config('config.enable_user_registration')): ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="/register" class="btn btn-block btn-danger"><?php echo trans('messages.create').' '.trans('messages.account'); ?>?</a>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                            </fieldset>
                        </form>

                        <?php if(config('config.enable_social_login')): ?>
                        <hr class="login-social-or"/>
                        <div class="text-center">
                            <p style="font-weight:bold;">Or</p>
                            <?php $__currentLoopData = config('constant.social_login_provider'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(config('config.enable_'.$provider.'_login')): ?>
                                <a class="btn btn-social btn-<?php echo e($provider.(($provider == 'google') ? '-plus' : '')); ?>" href="/auth/<?php echo e($provider); ?>">
                                    <i class="fa fa-<?php echo e($provider); ?>"></i> <?php echo e(toWord($provider)); ?>

                                </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="credit" style="margin-top: 10px;"><?php echo e(config('config.credit')); ?></div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('guest_layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>