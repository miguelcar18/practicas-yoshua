<div class="row">
    <div class="input-field">
        <?php echo Form::label('name',trans('messages.role').' '.trans('messages.name'),[]); ?>

        <?php echo Form::input('text','name',isset($role->name) ? toWord($role->name) : '',['class'=>'form-control','placeholder'=>trans('messages.role').' '.trans('messages.name')]); ?>

    </div>
    <div class="input-field">
        <?php echo Form::label('description',trans('messages.description'),[]); ?>

        <?php echo Form::textarea('description',isset($role->description) ? $role->description : '',['size' => '30x3', 'class' => 'materialize-textarea', 'placeholder' => trans('messages.description'),"data-show-counter" => 1]); ?>

        <span class="countdown"></span>
    </div>
    <?php if(!isset($role) || (isset($role) && !$role->default_user_role)): ?>
    <div class="input-field col s5">
        
        <?php echo Form::select('default_user_role', [
        '1'=>'Yes',
        '0'=>'No'
        ],(isset($role) && $role->default_user_role),[]); ?>

        <?php echo Form::label('default_user_role',trans('messages.default_user_role'),[]); ?>

    </div>
    <?php endif; ?>
</div>

