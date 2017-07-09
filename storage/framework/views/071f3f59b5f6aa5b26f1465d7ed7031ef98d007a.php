<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2"><?php echo e(trans('messages.mail')); ?> <?php echo e(trans('messages.configuration')); ?></h4>
            <?php echo Form::open(['route' => 'configuration.mail','role' => 'form', 'class'=>'config-mail-form','id' => 'config-mail-form','data-no-form-clear' => 1]); ?>


            <div class="row">			
                <div class="col-sm-6">
                    <div class="input-field col s6">
                        <?php echo Form::select('driver', [
                        null=>'Please Select',
                        'mail' => 'mail',
                        'sendmail' => 'sendmail',
                        'smtp' => 'smtp',
                        'mailgun' => 'mailgun',
                        'mandrill' => 'mandrill',
                        'log' => 'log'
                        ],(config('mail.driver')) ? : '',['id' => 'mail_driver']); ?>

                        <?php echo Form::label('driver','Driver',[]); ?>

                    </div>
                    <div class="input-field col s6">
                        <?php echo Form::input('email','from_address',config('mail.from.address') ? : '',[]); ?>

                        <?php echo Form::label('from_address','From Address',[]); ?>

                    </div>
                    <div class="input-field col s6">
                        <?php echo Form::input('text','from_name',config('mail.from.name') ? : '',[]); ?>

                        <?php echo Form::label('from_name','From Name',[]); ?>

                    </div>
                    <?php echo Form::hidden('config_type','mail'); ?>

                </div>
                <div class="col-sm-6">
                    <div id="smtp_configuration" class="mail_config">
                        <div class="input-field col s6">
                            <?php echo Form::input('text','host',(config('mail.host')) ? : '',[]); ?>

                            <?php echo Form::label('host','SMTP Host',[]); ?>

                        </div>
                        <div class="input-field col s6">
                            <?php echo Form::input('text','port',(config('mail.port')) ? : '',[]); ?>

                            <?php echo Form::label('port','SMTP Port',[]); ?>

                        </div>
                        <div class="input-field col s6">
                            <?php echo Form::input('text','username',(config('mail.username')) ? : '',[]); ?>

                            <?php echo Form::label('username','SMTP Username',[]); ?>

                        </div>
                        <div class="input-field col s6">
                            <?php echo Form::input('password','password',(config('mail.password')) ? config('config.hidden_value') : '',[]); ?>

                            <?php echo Form::label('password','SMTP Password',[]); ?>

                        </div>
                        <div class="input-field col s6">
                            <?php echo Form::select('encryption', ['ssl'=>'SSL',
                            'tls' => 'TLS'],(config('config.encryption')) ? : 'tls',[]); ?>

                            <?php echo Form::label('encryption','Encryption',[]); ?>

                        </div>
                    </div>
                    <div id="mandrill_configuration" class="mail_config">
                        <div class="input-field col s6">
                            <?php echo Form::input('text','mandrill_secret',(config('services.mandrill.secret')) ? : '',[]); ?>

                            <?php echo Form::label('mandrill_secret','Secret Key',[]); ?>

                        </div>
                    </div>
                    <div id="mailgun_configuration" class="mail_config">
                        <div class="input-field col s6">
                            <?php echo Form::input('text','mailgun_domain',(config('services.mailgun.domain')) ? : '',[]); ?>

                            <?php echo Form::label('mailgun_domain','Domain',[]); ?>

                        </div>
                        <div class="input-field col s6">
                            <?php echo Form::input('text','mailgun_secret',(config('services.mailgun.secret')) ? : '',[]); ?>

                            <?php echo Form::label('mailgun_secret','Secret Key',[]); ?>

                        </div>
                        <div class="input-field col s6">
                            <?php echo Form::input('text','mailgun_host',(config('mail.host')) ? : '',[]); ?>

                            <?php echo Form::label('mailgun_host','SMTP Host',[]); ?>

                        </div>
                        <div class="input-field col s6">
                            <?php echo Form::input('text','mailgun_port',(config('mail.port')) ? : '',[]); ?>

                            <?php echo Form::label('mailgun_port','SMTP Port',[]); ?>

                        </div>
                        <div class="input-field col s6">
                            <?php echo Form::input('text','mailgun_username',(config('mail.username')) ? : '',[]); ?>

                            <?php echo Form::label('mailgun_username','STMP Username',[]); ?>

                        </div>
                        <div class="input-field col s6">
                            <?php echo Form::label('mailgun_password','STMP Password',[]); ?>

                            <?php echo Form::input('password','mailgun_password',(config('mail.password')) ? : '',[]); ?>





                        </div>
                        
                    </div>
                    <div class="row">
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light light-blue darken-4 right" type="submit" name="action"><?php echo e(isset($buttonText) ? $buttonText : trans('messages.save')); ?>

                                    
                                </button>
                            </div>
                        </div>
                </div>
                <div class="clear"></div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>