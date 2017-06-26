<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2"><?php echo e(trans('messages.general')); ?> <?php echo e(trans('messages.configuration')); ?></h4>
            <?php echo Form::open(['route' => 'configuration.store','role' => 'form','class'=>'config-system-form', 'id' => 'config-general-form','data-no-form-clear' => 1]); ?>

            <div class="row">
                <div class="col-sm-6">
                    <div class="input-field col s6">
                        <?php echo Form::input('text','company_name',(config('config.company_name')) ? : ''); ?>

                        <?php echo Form::label('company_name',trans('messages.company').' '.trans('messages.name'),[]); ?>

                    </div>
                    <div class="input-field col s6">
                        <?php echo Form::input('text','contact_person',(config('config.contact_person')) ? : ''); ?>

                        <?php echo Form::label('contact_person',trans('messages.contact').' '.trans('messages.person'),[]); ?>

                    </div>
                    <div class="input-field col s6">

                        <?php echo Form::input('text','email',(config('config.email')) ? : '',[]); ?>

                        <?php echo Form::label('email',trans('messages.email'),[]); ?>

                    </div>
                    <div class="input-field col s6">
                        <?php echo Form::input('text','phone',(config('config.phone')) ? : '',[]); ?>

                        <?php echo Form::label('phone',trans('messages.phone'),[]); ?>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-field col s6">
                        <div class="input-field col s12">
                            <?php echo Form::label('address',trans('messages.address'),[]); ?>

                            <?php echo Form::input('text','address_1',(config('config.address_1')) ? : '',[]); ?>

                        </div>
                        <br />
                        <div class="input-field col s12">
                            <?php echo Form::label('address',trans('messages.address'),[]); ?>

                            <?php echo Form::input('text','address_2',(config('config.address_2')) ? : '',[]); ?>

                        </div>
                        <br />

                        <div class="row">
                            <div class="input-field col s6">
                                <?php echo Form::input('text','city',(config('config.city')) ? : '',[]); ?>

                                <?php echo Form::label('address',trans('messages.city'),[]); ?>

                            </div>
                            <div class="input-field col s6">
                                <?php echo Form::input('text','state',(config('config.state')) ? : '',[]); ?>

                                <?php echo Form::label('address',trans('messages.state'),[]); ?>

                            </div>
                            <div class="input-field col s6">
                                <?php echo Form::input('text','zipcode',(config('config.zipcode')) ? : '',[]); ?>

                                <?php echo Form::label('address',trans('messages.zipcode'),[]); ?>

                            </div>
                        </div>
                        <br />
                        <div class="input-field col s6">
                            <?php echo Form::select('country_id', config('country'),(config('config.country_id')) ? : '',[]); ?>

                            <?php echo Form::label('address',trans('messages.country'),[]); ?>


                        </div>
                    </div>


                    <?php echo Form::hidden('config_type','general'); ?>

                </div>

            </div>



            <div class="row">
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light light-blue darken-4 right" type="submit" name="action"><?php echo e(isset($buttonText) ? $buttonText : trans('messages.save')); ?>

                        
                    </button>
                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>


    </div>
</div>
