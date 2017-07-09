<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START FOOTER -->
<footer class="page-footer">
    <div class="footer-copyright">
        <div class="container">
            <span>Copyright © 2015 <a class="grey-text text-lighten-4" href="http://themeforest.net/user/geekslabs/portfolio?ref=geekslabs" target="_blank">GeeksLabs</a> All rights reserved.</span>
            <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://geekslabs.com/">GeeksLabs</a></span>
        </div>
    </div>
</footer>
<!-- END FOOTER -->



<!-- ================================================
Scripts
================================================ -->

<!-- jQuery Library-->
<script type="text/javascript" src="<?php echo e(asset('materialize/js/plugins/jquery-1.11.2.min.js')); ?>"></script>

<!--materialize js-->
<script type="text/javascript" src="<?php echo e(asset('materialize/js/materialize.js')); ?>"></script>

<!--prism-->
<script type="text/javascript" src="<?php echo e(asset('materialize/js/plugins/prism/prism.js')); ?>"></script>
<!--scrollbar-->
<script type="text/javascript" src="<?php echo e(asset('materialize/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>

<!-- chartist
<script type="text/javascript" src="<?php echo e(asset('materialize/js/plugins/chartist-js/chartist.min.js')); ?>"></script>
 -->
<!-- data-tables -->
<script type="text/javascript" src="<?php echo e(asset('materialize/js/plugins/data-tables/js/jquery.dataTables.min.js')); ?>"></script>
<!--<script type="text/javascript" src="<?php echo e(asset('materialize/js/plugins/data-tables/data-tables-script.js')); ?>"></script>-->

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="<?php echo e(asset('materialize/js/plugins.js')); ?>"></script>
<!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="<?php echo e(asset('materialize/js/custom-script.js')); ?>"></script>


<div id="js-var" style="visibility:none;"
     data-toastr-position="<?php echo e(config('config.notification_position')); ?>"
     data-something-error-message="<?php echo e(trans('messages.something_error_message')); ?>"
     data-character-remaining="<?php echo e(trans('messages.character_remaining')); ?>"
     data-textarea-limit="<?php echo e(config('config.textarea_limit')); ?>"
     data-calendar-language="<?php echo $calendar_language; ?>"
     data-datepicker-language="<?php echo $datepicker_language; ?>"
     data-datatable-language="/assets/vendor/datatables/locale/<?php echo config('lang.'.$default_language.'.datatable'); ?>.json"
    ></div>

<?php echo Html::script('assets/vendor/toastr/toastr.min.js'); ?>

<?php echo $__env->make('common.toastr_notification', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo Html::script('assets/vendor/password/password.js'); ?>

<?php echo Html::script('assets/vendor/select2/select2.min.js'); ?>

<?php echo Html::script('assets/vendor/icheck/icheck.min.js'); ?>

<?php echo Html::script('assets/js/textAvatar.js'); ?>

<?php echo Html::script('assets/vendor/switch/bootstrap-switch.min.js'); ?>

<?php echo Html::script('assets/vendor/fileinput/fileinput.min.js'); ?>


<?php if(in_array('recaptcha',$assets)): ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php endif; ?>







<?php echo Html::script('assets/js/wmlab.js'); ?>

<?php echo Html::script('assets/js/app.js'); ?>


<script>
$.ajaxSetup({
    headers: {'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')}
});

</script>

 


yield('scripts')



</body>

</html>

