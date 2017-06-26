

<?php $__env->startSection('breadcrumbs'); ?>
<h5 class="breadcrumbs-title">Save</h5>
<ul class="breadcrumbs">
    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
    <li><a href="/user"><?php echo trans('messages.permission'); ?></a></li>

</ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col l12">
        <div class="card-panel">
            
            <h4 class="header2"><strong><?php echo trans('messages.save').'</strong> '.trans('messages.permission'); ?></h4>

            
            <?php echo Form::open(['route' => 'permission.save-permission','role' => 'form', 'class'=>'permission-form','id' => 'permission-form','data-no-form-clear' => 1]); ?>

            
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th><?php echo trans('messages.permission'); ?></th>
                        <?php $__currentLoopData = \App\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th><?php echo toWord($role->name); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($permission->category != $category): ?>
                    <tr style="background-color:#3498DB;color:#ffffff;"><td colspan="<?php echo count(\App\Role::all())+1; ?> "><strong><?php echo toWord($permission->category).' '.trans('messages.module'); ?></strong></td></tr>
                    <?php $category = $permission->category; ?>
                    <?php endif; ?>
                    <tr>
                        <td><?php echo toWord($permission->name); ?></td>
                        <?php $__currentLoopData = \App\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th><input class="icheck" type="checkbox" name="permission[<?php echo $role->id; ?>][<?php echo $permission->id; ?>]" value = '1' <?php echo (in_array($role->id.'-'.$permission->id,$permission_role)) ? 'checked' : ''; ?> <?php if($role->is_hidden): ?> disabled <?php endif; ?>></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="row">
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light light-blue darken-4 right" type="submit" name="action"><?php echo e(isset($buttonText) ? $buttonText : trans('messages.save')); ?>


                    </button>
                </div>
            </div>

            
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.materialize.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>