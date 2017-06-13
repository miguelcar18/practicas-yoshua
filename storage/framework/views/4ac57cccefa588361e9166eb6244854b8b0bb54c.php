
<div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
           <!-- <input id="username" type="text">-->
             <input type="text" name="first_name" id="first_name">
            <label class="center-align"><?php echo trans('messages.first').' '.trans('messages.name'); ?></label>
        </div>
</div>

<div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
           <!-- <input id="username" type="text">-->
             <input type="text" name="last_name" id="last_name">
            <label  class="center-align"><?php echo trans('messages.last').' '.trans('messages.name'); ?></label>
        </div>
</div>

<div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
           <!-- <input id="username" type="text">-->
             <input type="text" name="email" id="email">
            <label  class="center-align"><?php echo trans('messages.email'); ?></label>
        </div>
</div>



<?php if(!config('config.login')): ?>
<div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
           <!-- <input id="username" type="text">-->
             <input type="text" name="username" id="username">
            <label  class="center-align"><?php echo trans('messages.username'); ?></label>
        </div>
</div>
<?php endif; ?>

<div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
           <!-- <input id="username" type="text">-->
             <input type="password" name="password" id="password" class="<?php echo e((config('config.enable_password_strength_meter') ? 'password-strength' : '')); ?>" >
            <label  class="center-align"><?php echo trans('messages.password'); ?></label>
        </div> 
</div>

<div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
           <!-- <input id="username" type="text">-->
           <input type="password" name="password_confirmation" id="password_confirmation" >
           <label  class="center-align"><?php echo trans('messages.confirm').' '.trans('messages.password'); ?></label>
        </div> 
</div>

<!--
<?php echo e(getCustomFields('user-registration-form')); ?>

<?php if(Auth::check()): ?>
<div class="form-group">
    <input name="send_welcome_email" type="checkbox" class="switch-input" data-size="mini" data-on-text="Yes" data-off-text="No" value="1"> <?php echo e(trans('messages.send')); ?> welcome email
</div>
<?php endif; ?>
<?php if(config('config.enable_tnc')): ?>
<div class="form-group">
    <input name="tnc" type="checkbox" class="switch-input" data-size="mini" data-on-text="Yes" data-off-text="No" value="1"> I accept <a href="/terms-and-conditions">Terms & Conditions</a>.
</div>
<?php endif; ?>
<?php if(config('config.enable_recaptcha') && !Auth::check()): ?>
<div class="g-recaptcha" data-sitekey="<?php echo e(config('config.recaptcha_key')); ?>"></div>
<br />
<?php endif; ?>
-->