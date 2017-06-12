    <div id="js-var" style="visibility:none;" 
        data-toastr-position="<?php echo e(config('config.notification_position')); ?>"
        data-something-error-message="<?php echo e(trans('messages.something_error_message')); ?>"
        data-character-remaining="<?php echo e(trans('messages.character_remaining')); ?>"
        data-textarea-limit="<?php echo e(config('config.textarea_limit')); ?>"
        data-calendar-language="<?php echo $calendar_language; ?>" 
        data-datepicker-language="<?php echo $datepicker_language; ?>" 
        data-datatable-language="/assets/vendor/datatables/locale/<?php echo config('lang.'.$default_language.'.datatable'); ?>.json" 
    ></div>

    <?php echo Html::script('assets/vendor/jquery/jquery.min.js'); ?>

    <?php echo Html::script('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>

    <?php echo Html::script('assets/vendor/toastr/toastr.min.js'); ?>

    <?php echo $__env->make('common.toastr_notification', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo Html::script('assets/vendor/metisMenu/metisMenu.min.js'); ?>

    <?php echo Html::script('assets/vendor/switch/bootstrap-switch.min.js'); ?>

    <?php echo Html::script('assets/vendor/datepicker/js/bootstrap-datepicker.js'); ?>

    <?php echo Html::script('assets/vendor/datatables/datatables.min.js'); ?>

    <?php echo Html::script('assets/vendor/summernote/summernote.min.js'); ?>

    <?php echo Html::script('assets/vendor/select2/select2.min.js'); ?>

    <?php echo Html::script('assets/vendor/fileinput/fileinput.min.js'); ?>

    <?php echo Html::script('assets/vendor/password/password.js'); ?>

    <?php if(in_array('calendar',$assets)): ?>
        <?php echo Html::script('assets/vendor/calendar/moment.min.js'); ?>

        <?php echo Html::script('assets/vendor/calendar/fullcalendar.min.js'); ?>

        <?php echo Html::script('assets/vendor/calendar/locale-all.js'); ?>

    <?php endif; ?>
    <?php if(in_array('recaptcha',$assets)): ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php endif; ?>
    <?php echo Html::script('assets/vendor/tags/tags.min.js'); ?>

    <?php echo Html::script('assets/vendor/icheck/icheck.min.js'); ?>

    <?php echo Html::script('assets/js/bootbox.js'); ?>

    <?php echo Html::script('assets/js/textAvatar.js'); ?>

    <?php echo Html::script('assets/js/script.min.js'); ?>


    <?php if(config('lang.'.$default_language.'.datepicker') != 'en'): ?>
        <?php echo Html::script('assets/vendor/datepicker/locales/bootstrap-datepicker.'.config('lang.'.$default_language.'.datepicker').'.min.js'); ?>

    <?php endif; ?>
    <script>
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
    });
    var calendar_events = <?php echo (isset($events)) ? json_encode($events) : '""'; ?>;
    </script>
    <?php echo Html::script('assets/js/wmlab.js'); ?>

    <?php echo Html::script('assets/js/app.js'); ?>

</body>
</html>