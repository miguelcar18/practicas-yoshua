<?php $__env->startSection('content'); ?>
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>        
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->
<div id="error-page">

    <div class="row">
        <div class="col s12">
            <div class="browser-window">
                <div class="top-bar">
                    <div class="circles">
                        <div id="close-circle" class="circle"></div>
                        <div id="minimize-circle" class="circle"></div>
                        <div id="maximize-circle" class="circle"></div>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div id="site-layout-example-top" class="col s12">
                            
                            <p class="flat-text-logo center white-text caption-uppercase"><?php echo trans('messages.page_not_found'); ?>  <?php echo trans('messages.back_to'); ?> <a href="/"><?php echo trans('messages.home'); ?></a></p>
                      
                           
                        </div>
                        <div id="site-layout-example-right" class="col s12 m12 l12">
                            <div class="row center">
                                <h1 class="text-long-shadow col s12">Error 404</h1>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.materialize.guest', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>