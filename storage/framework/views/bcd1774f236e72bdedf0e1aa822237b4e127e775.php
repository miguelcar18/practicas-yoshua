            <div class="navbar-default sidebar" role="navigation">
                <div class="col-md-12 profile-info">
                    <div class="user-info">
                        <div class="user-avatar"><?php echo getAvatar(Auth::user()->id,75); ?></div>
                        <p><?php echo trans('messages.welcome_back').', <br /><span>'.Auth::user()->full_name; ?></span></p><p><small><?php echo trans('messages.last').' '.trans('messages.login').': '.showDateTime(Auth::user()->last_login); ?></small></p>
                    </div>
                </div>
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li>
                        <li><a href="/home"><i class="fa fa-home fa-fw"></i> <?php echo e(trans('messages.home')); ?></a></li>
                        <?php if(Entrust::can('manage-user')): ?>
                            <li><a href="/user"><i class="fa fa-users fa-fw"></i> <?php echo e(trans('messages.user')); ?></a></li>
                        <?php endif; ?>
                        <?php if(Entrust::can('manage-role')): ?>
                            <li><a href="/role"><i class="fa fa-user fa-fw"></i> <?php echo e(trans('messages.user').' '.trans('messages.role')); ?></a></li>
                        <?php endif; ?>
                        <?php if(Entrust::can('manage-permission')): ?>
                            <li><a href="/permission"><i class="fa fa-lock fa-fw"></i> <?php echo e(trans('messages.permission')); ?></a></li>
                        <?php endif; ?>
                        <?php if(Entrust::can('manage-custom-field') && config('config.enable_custom_field')): ?>
                            <li><a href="/custom-field"><i class="fa fa-wrench fa-fw"></i> <?php echo e(trans('messages.custom').' '.trans('messages.field')); ?></a></li>
                        <?php endif; ?>
                        <?php if(Entrust::can('manage-language') && config('config.multilingual')): ?>
                            <li><a href="/language"><i class="fa fa-globe fa-fw"></i> <?php echo e(trans('messages.language')); ?></a></li>
                        <?php endif; ?>
                        <?php if(Entrust::can('manage-template') && config('config.enable_email_template')): ?>
                            <li><a href="/template"><i class="fa fa-envelope fa-fw"></i> <?php echo e(trans('messages.email').' '.trans('messages.template')); ?></a></li>
                        <?php endif; ?>
                        <?php if(config('config.enable_activity_log')): ?>
                        <li><a href="/activity-log"><i class="fa fa-bars fa-fw"></i> <?php echo e(trans('messages.activity').' '.trans('messages.log')); ?></a></li>
                        <?php endif; ?>
                        <?php if(Entrust::can('manage-message') && config('config.enable_message')): ?>
                        <li><a href="/message"><i class="fa fa-paper-plane fa-fw"></i> <?php echo e(trans('messages.message')); ?></a></li>
                        <?php endif; ?>
                        <?php if(Entrust::can('manage-ip-filter') && config('config.enable_ip_filter')): ?>
                            <li><a href="/ip-filter"><i class="fa fa-ellipsis-v fa-fw"></i> IP <?php echo e(trans('messages.filter')); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>