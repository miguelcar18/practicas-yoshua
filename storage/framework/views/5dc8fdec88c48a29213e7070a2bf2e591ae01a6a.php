            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><?php echo config('config.application_name').' '.config('code.version'); ?></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <?php if(Entrust::can('manage-backup') && config('config.enable_backup')): ?>
                    <li><a href="/backup"><i class="fa fa-database fa-lg icon" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('messages.backup')); ?>"></i></a></li>
                <?php endif; ?>

                <?php if(Entrust::can('manage-configuration')): ?>
                <li><a href="/configuration"><i class="fa fa-cogs fa-lg icon" data-toggle="tooltip" data-placement="left" title="<?php echo e(trans('messages.configuration')); ?>"></i></a></li>
                <?php endif; ?>

                <?php if(Entrust::can('manage-todo') && config('config.enable_to_do')): ?>
                <li><a href="#" data-href="/todo" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-list-ul fa-lg icon" data-toggle="tooltip" data-placement="left" title="<?php echo trans('messages.to_do'); ?>" data-placement="bottom"></i></a></li>
                <?php endif; ?>

                <?php if(config('config.multilingual') && Entrust::can('change-language')): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language fa-lg icon" data-toggle="tooltip" title="<?php echo trans('messages.language'); ?>" data-placement="left"></i> </a>
                    <ul class="dropdown-menu animated half flipInX">
                        <li class="active"><a href="#" style="color:white;cursor:default;"><?php echo config('lang.'.$default_language.'.language').' ('.$default_language.')'; ?></a></li>
                        <?php $__currentLoopData = config('lang'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($default_language != $key): ?>
                            <li><a href="/set-language/<?php echo e($key); ?>"><?php echo $language['language']." (".$key.")"; ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
                <?php endif; ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw" data-toggle="tooltip" title="<?php echo trans('messages.profile'); ?>" data-placement="left"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" data-href="/change-password" data-toggle="modal" data-target="#myModal"><i class="fa fa-key fa-fw"></i> <?php echo trans('messages.change').' '.trans('messages.password'); ?></a></li>
                        <?php if(env('MODE') && defaultRole()): ?>
                            <li><a href="/release-license"><i class="fa fa-hand-spock-o fa-fw"></i> <?php echo trans('messages.release_license'); ?></a></li>
                        <?php endif; ?>
                        <li><a href="#" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> <?php echo trans('messages.logout'); ?></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>