 <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START RIGHT SIDEBAR NAV-->
        <aside id="right-sidebar-nav">
            <ul id="chat-out" class="side-nav rightside-navigation">
                  <div class="row">
                    <?php if(config('config.enable_group_chat')): ?>
                    <div class="panel panel-primary chat-panel col s4">
                        <div class="panel-heading">
                            <strong><?php echo e(trans('messages.group')); ?></strong> <?php echo e(trans('messages.chat')); ?>

                        </div>
                        <div class="panel-body" id="chat-box">
                            <div id="chat-messages" data-chat-refresh="<?php echo e(config('config.enable_chat_refresh')); ?>" data-chat-refresh-duration="<?php echo e(config('config.chat_refresh_duration')); ?>"></div>
                        </div>
                        <div class="panel-footer">
                            <?php echo Form::open(['route' => 'chat.store','role' => 'form', 'class'=>'chat-form','id' => 'chat-form','data-refresh' => 'chat-messages']); ?>

                            <?php echo Form::input('text','message','',['class'=>'form-control','data-autoresize' => 1,'placeholder' => 'Type your message here..']); ?>

                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                    <?php endif; ?>

                </div>
            </ul>
        </aside>
        <!-- LEFT RIGHT SIDEBAR NAV-->