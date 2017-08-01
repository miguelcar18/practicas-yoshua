<!-- START LEFT SIDEBAR NAV-->
<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <?php echo getAvatar(Auth::user()->id,77); ?>


                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="user/<?php echo Auth::user()->id; ?>"><i class="mdi-action-face-unlock"></i> Profile</a>
                        </li>
                        <?php if(Entrust::can('manage-configuration')): ?>
                        <li><a href="configuration"><i class="mdi-action-settings"></i> Settings</a>
                        </li>
                        <?php endif; ?>
                        <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="lock"><i class="mdi-action-lock-outline"></i> Lock</a>
                        </li>

                        <li><a href="#" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="mdi-hardware-keyboard-tab"></i> <?php echo trans('messages.logout'); ?></a>
                        </li>


                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo Auth::user()->full_name; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>



                </div>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </div>
        </li>
        <li class="bold"><a href="/home" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Home</a>
        </li>

        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i> Archivos</a>
                    <div class="collapsible-body">
                        <ul>
                            <?php if(Entrust::can('manage-user')): ?>
                            <li><a href="user">Users</a>
                            </li>
                            <?php endif; ?>


                        </ul>

                    </div>
                </li>
            </ul>
        </li>

        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-settings"></i>Configuración</a>
                    <div class="collapsible-body">
                        <ul>
                            <?php if(Entrust::can('manage-configuration')): ?>
                            <li><a href="<?php echo e(URL::to('configuration')); ?>">Settings</a>
                            </li>
                            <?php endif; ?>

                            <?php if(Entrust::can('manage-permission')): ?>
                            <li><a href="<?php echo e(URL::to('permission')); ?>"></i> <?php echo e(trans('messages.permission')); ?></a></li>
                            <?php endif; ?>

                            <?php if(Entrust::can('manage-role')): ?>
                            <li><a href="<?php echo e(URL::to('role')); ?>"></i> <?php echo e(trans('messages.user').' '.trans('messages.role')); ?></a></li>
                            <?php endif; ?>

                            <?php if(Entrust::can('manage-ip-filter') && config('config.enable_ip_filter')): ?>
                            <li><a href="<?php echo e(URL::to('ip-filter')); ?>">IP <?php echo e(trans('messages.filter')); ?></a></li>
                            <?php endif; ?>
                            <?php if(Entrust::can('manage-template') && config('config.enable_email_template')): ?>
                            <li><a href="<?php echo e(URL::to('template')); ?>"><?php echo e(trans('messages.email').' '.trans('messages.template')); ?></a></li>
                            <?php endif; ?>
                            <?php if(config('config.enable_activity_log')): ?>
                            <li><a href="<?php echo e(URL::to('activity-log')); ?>"><?php echo e(trans('messages.activity').' '.trans('messages.log')); ?></a></li>
                            <?php endif; ?>

                            <?php if(Entrust::can('manage-backup') && config('config.enable_backup')): ?>
                            <li><a href="<?php echo e(URL::to('backup')); ?>"><?php echo e(trans('messages.backup')); ?></a></li>
                            <?php endif; ?>

                            <?php if(Entrust::can('manage-language') && config('config.multilingual')): ?>
                            <li><a href="/language"><i class="fa fa-globe fa-fw"></i> <?php echo e(trans('messages.language')); ?></a></li>
                            <?php endif; ?>

                        </ul>





                </li>
            </ul>
        </li>
        <li><a href="#" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="mdi-hardware-keyboard-tab"></i> <?php echo trans('messages.logout'); ?></a>
        </li>




        
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
</aside>
<!-- END LEFT SIDEBAR NAV-->

<!-- //////////////////////////////////////////////////////////////////////////// -->
