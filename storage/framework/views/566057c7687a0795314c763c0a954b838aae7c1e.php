<div class="input-field col s6">
    <?php if(!$user->hasRole(DEFAULT_ROLE)): ?>
    <div class="input-field col s12">
        <p> <?php echo Form::label('role',trans('messages.role'),[]); ?>

            
            <?php echo Form::select('role_id[]',$roles,$user_roles,['class'=>'select_multiple mdb-select','id'=>'select','style' => 'width:100%;','multiple' => 'multiple']); ?>


           
        </p>
    </div>
    <?php endif; ?>
    <div class="col s12">

        <div class="row">
            <div class="input-field col s6">
                <p><?php echo Form::input('text','first_name',$user->Profile->first_name,['placeholder'=>trans('messages.first').' '.trans('messages.name')]); ?></p>
                <?php echo Form::label('first_name',trans('messages.name'),[]); ?>

            </div>
            <div class="input-field col s6">
                <p><?php echo Form::input('text','last_name',$user->Profile->last_name,['placeholder'=>trans('messages.last').' '.trans('messages.name')]); ?></p>

            </div>

        </div>

    </div>
    <div class="input-field col s12">

        <div class="row">
            <div class="col x8">
                <p><?php echo Form::input('text','work_phone',$user->Profile->work_phone,['placeholder'=>trans('messages.work')]); ?>

                    <?php echo Form::label('work_phone',trans('messages.phone')); ?></p>
            </div>
            <div class="col x4">
                <?php echo Form::input('text','work_phone_extension',$user->Profile->work_phone_extension,['class'=>'form-control','placeholder'=>trans('messages.ext')]); ?>

            </div>
        </div>
        <br />
        <?php echo Form::input('text','mobile',$user->Profile->mobile,['placeholder'=>trans('messages.mobile')]); ?>

        <div class="help-block">This will be used to send two factor auth code.</div>
        <br />
        <?php echo Form::input('text','home',$user->Profile->home,['class'=>'form-control','placeholder'=>trans('messages.home')]); ?>

    </div>
</div>
<div class="col m6">
    <div class="input-field col s12">
        <p><?php echo Form::input('text','date_of_birth',$user->Profile->date_of_birth,['class'=>'datepicker','placeholder'=>trans('messages.date_of_birth')]); ?>

            <?php echo Form::label('date_of_birth',trans('messages.date_of_birth'),[]); ?></p>
    </div>
    <div class="input-field col s12">
        <p><?php echo Form::input('text','address_1',$user->Profile->address_line_1,['placeholder'=>trans('messages.address_line_1')]); ?>

            <?php echo Form::label('address',trans('messages.address'),[]); ?></p>
        <br />
        <?php echo Form::input('text','address_2',$user->Profile->address_line_2,['placeholder'=>trans('messages.address_line_2')]); ?>

        <br />
        <div class="row">
            <div class="col x5">
                <?php echo Form::input('text','city',$user->Profile->city,['class'=>'form-control','placeholder'=>trans('messages.city')]); ?>

            </div>
            <div class="col x4">
                <?php echo Form::input('text','state',$user->Profile->state,['class'=>'form-control','placeholder'=>trans('messages.state')]); ?>

            </div>
            <div class="col x3">
                <?php echo Form::input('text','zipcode',$user->Profile->zipcode,['class'=>'form-control','placeholder'=>trans('messages.zipcode')]); ?>

            </div>
        </div>
        <br />
        <?php echo Form::select('country_id', config('country'),$user->Profile->country_id,['placeholder'=>trans('messages.country'),'style' => 'width:100%;']); ?>

    </div>
    <div class="row">
        <div class="input-field col s12">
            <button class="btn waves-effect waves-light light-blue darken-4 right" type="submit" name="action"><?php echo e(isset($buttonText) ? $buttonText : trans('messages.save')); ?>


            </button>
        </div>
    </div>
</div>
</div>
<?php echo Form::close(); ?>

</div>
   