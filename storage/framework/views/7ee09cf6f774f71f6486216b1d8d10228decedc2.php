<ul class="chat">
<?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="<?php echo e(($chat->user_id == Auth::user()->id) ? 'right' : 'left'); ?> clearfix">
        <span class="chat-img pull-<?php echo e(($chat->user_id == Auth::user()->id) ? 'right' : 'left'); ?>">
            <?php echo getAvatar($chat->user_id,45); ?>

        </span>
        <div class="chat-body clearfix">
            <div class="header">
                <strong class="primary-font"><?php echo e($chat->User->full_name); ?></strong>
                <small class="pull-right text-muted">
                    <i class="fa fa-clock-o fa-fw"></i> <?php echo e(timeAgo($chat->created_at)); ?>

                </small>
            </div>
            <p>
                <?php echo e($chat->message); ?>

            </p>
        </div>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>