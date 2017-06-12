<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <?php echo Html::style('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>

    <?php echo Html::style('assets/vendor/bootstrap-social/bootstrap-social.css'); ?>

    <?php echo Html::style('assets/vendor/switch/bootstrap-switch.min.css'); ?>

    <?php echo Html::style('assets/vendor/toastr/toastr.min.css'); ?>

    <?php echo Html::style('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>

    <?php echo Html::style('assets/vendor/select2/select2.min.css'); ?>

    <?php echo Html::style('assets/vendor/select2/select2-bootstrap.min.css'); ?>

    <?php if(isset($assets) && in_array('form-wizard',$assets)): ?>
        <?php echo Html::style('assets/vendor/form-wizard/form-wizard.css'); ?>

    <?php endif; ?>
    <?php echo Html::style('assets/vendor/datepicker/css/datepicker.css'); ?>

    <?php echo Html::style('assets/vendor/icheck/skins/flat/blue.css'); ?>

    <?php echo Html::style('assets/css/custom.css'); ?>

    <link href="" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>