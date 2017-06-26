<?php
/* @var $url */
/* @var $label */
?>
<div class="col s12 m8 l9">
    
        <div class="row">
            <div class="col s2">
                <div class="center promo promo-example">
                    <div class="<?php echo e($icon); ?>" style="font-size:55px;"></div>
                    <div class="light center"><?php echo e($message); ?></div>
                </div>
            </div>

    <div class="col s10">
        <div class="right-align promo promo-example">
            <?php if(Entrust::can('create-user')): ?>
                <div class="additional-btn">
                    <p><a href="<?php echo e($url); ?>" class="btn waves-effect waves-light  cyan darken-2"><?php echo e($buttonMessage); ?></a></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
   
</div>
