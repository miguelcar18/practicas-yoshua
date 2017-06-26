<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2">Sms</h4>
            <?php echo Form::open(['route' => 'configuration.sms','role' => 'form', 'class'=>'config-sms-form','id' => 'config-sms-form','data-no-form-clear' => 1]); ?>

            <div class="row">
                <div class="col-sm-6">
                    <div class="input-field col s6">
                        <?php echo Form::input('text','nexmo_api_key',config('config.nexmo_api_key') ? config('config.hidden_value') : '',[]); ?>

                        <?php echo Form::label('nexmo_api_key','Nexmo API Key',[]); ?>

                    </div>
                    <div class="input-field col s6">
                        <?php echo Form::input('text','nexmo_api_secret',config('config.nexmo_api_secret') ? config('config.hidden_value') : '',[]); ?>

                        <?php echo Form::label('nexmo_api_secret','Nexmo API Secret',[]); ?>

                    </div>
                    <div class="input-field col s6">
                        <?php echo Form::input('text','nexmo_from_number',config('config.nexmo_from_number') ? : '',[]); ?>

                        <?php echo Form::label('nexmo_from_number','Nexmo From Number',[]); ?>

                    </div>
                    <?php echo Form::hidden('config_type','sms'); ?>

                </div>
                <div class="clear"></div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light light-blue darken-4 right" type="submit" name="action"><?php echo e(isset($buttonText) ? $buttonText : trans('messages.save')); ?>

                            
                        </button>
                    </div>
                    <?php echo Form::hidden('config_type','sms'); ?>

                </div>
                <?php echo Form::close(); ?>

            </div>                
        </div>

    </div>

</div>