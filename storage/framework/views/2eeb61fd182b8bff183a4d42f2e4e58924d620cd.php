<?php echo $__env->make('layouts.materialize.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.materialize.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        <?php echo $__env->make('layouts.materialize.left-side-nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- START CONTENT -->
        <section id="content">

            <!--breadcrumbs start-->
            <div id="breadcrumbs-wrapper">
                <!-- Search for small screen -->
                <div class="header-search-wrapper grey hide-on-large-only">
                    <i class="mdi-action-search active"></i>
                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <?php echo $__env->yieldContent('breadcrumbs'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--breadcrumbs end-->


            <!--start container-->
            <div class="container">
                <div class="section">

                    <div class="divider"></div>
                    <?php echo $__env->yieldContent('content'); ?>
                    <div class="divider"></div>
                </div>
                <!-- Floating Action Button -->
                <!-- <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
                     <a class="btn-floating btn-large">
                         <i class="mdi-action-stars"></i>
                     </a>
                     <ul>
                         <li><a href="css-helpers.html" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
                         <li><a href="app-widget.html" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
                         <li><a href="app-calendar.html" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
                         <li><a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
                     </ul>
                 </div>
                <!-- Floating Action Button -->
            </div>
            <!--end container-->
        </section>
        <!-- END CONTENT -->

        <?php echo $__env->make('layouts.materialize.rigth-side-nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
    <!-- END WRAPPER -->

</div>
<!-- END MAIN -->

<?php echo $__env->make('layouts.materialize.foot', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



