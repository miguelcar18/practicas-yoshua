
                                   <div class="row margin">
                                        <div class="input-field col s6">
                                             <input type="text" name="first_name" id="first_name"  placeholder="<?php echo trans('messages.first').' '.trans('messages.name'); ?>">
                                             <label for="name"><?php echo e(trans('messages.name')); ?></label>
                                   
                                        </div>
                                        <div class="input-field col s6">
                                             <input type="text" name="last_name" id="last_name" class="form-control" placeholder="<?php echo trans('messages.last').' '.trans('messages.name'); ?>">
                                        </div>
                                    </div>
                                    
                               
                                <div class="row">
                                <div class="input-field col s12">
                                    <input type="email" name="email" id="email">
                                    <label for="email"><?php echo e(trans('messages.email')); ?></label>
                                </div>
                                </div>
                                <?php if(!config('config.login')): ?>
                                <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" name="username" id="username">
                                    <label for="username"><?php echo e(trans('messages.username')); ?></label>
                                </div>
                                </div>
                                <?php endif; ?>
                               <div class="row">
                                <div class="input-field col s12">
                                    <input type="password" name="password" id="password" class="<?php echo e((config('config.enable_password_strength_meter') ? 'password-strength' : '')); ?>">
                                     <label for="password"><?php echo e(trans('messages.password')); ?></label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="input-field col s12">
                                    <input type="password" name="password_confirmation" id="password_confirmation" > 
                                     <label for="password_confirmation"><?php echo e(trans('messages.confirm').' '.trans('messages.password')); ?></label>

                                </div>
                                </div>
                                <?php echo e(getCustomFields('user-registration-form')); ?>

                                <?php if(Auth::check()): ?>
                                <div class="row">
                                <div class="input-field col s12">
                                    <input name="send_welcome_email" type="checkbox" class="switch-input" data-size="mini" data-on-text="Yes" data-off-text="No" value="1"> <?php echo e(trans('messages.send')); ?> welcome email
                                </div>
                                </div>
                                <?php endif; ?>
                                <?php if(config('config.enable_tnc')): ?>
                                <div class="row">
                                <div class="input-field col s12">
                                    <input name="tnc" type="checkbox" class="switch-input" data-size="mini" data-on-text="Yes" data-off-text="No" value="1"> I accept <a href="/terms-and-conditions">Terms & Conditions</a>.
                                </div>
                                </div>
                                <?php endif; ?>
                                <?php if(config('config.enable_recaptcha') && !Auth::check()): ?>
                                <div class="row">
                                <div class="g-recaptcha" data-sitekey="<?php echo e(config('config.recaptcha_key')); ?>"></div>
                                </div>
                                <br />
                                <?php endif; ?>