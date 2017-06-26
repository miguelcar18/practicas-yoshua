@extends('layouts.materialize.default')

@section('breadcrumbs')

<h5 class="breadcrumbs-title">Home</h5>
<ol class="breadcrumbs">
    <li class="active">Home</li>
</ol>
@stop
@section('content')

<!--card stats start-->
                    <div id="card-stats">
                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content  green white-text">
                                        <p class="card-stats-title"><i class="mdi-social-group-add"></i>{{trans('messages.active').' '.trans('messages.user')}}</p>
                                        <h4 class="card-stats-number">{{\App\User::whereStatus('active')->count()}}</h4>
                                       
                                    </div>
                                    <div class="card-action  green darken-2">
                                        <div id="clients-bar" class="center-align"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content pink lighten-1 white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i>{{trans('messages.banned').' '.trans('messages.user')}}</p>
                                        <h4 class="card-stats-number">{{\App\User::whereStatus('banned')->count()}}</h4>
                                        
                                    </div>
                                    <div class="card-action  pink darken-2">
                                        <div id="invoice-line" class="center-align"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content blue-grey white-text">
                                        <p class="card-stats-title"><i class="mdi-action-trending-up"></i>{{trans('messages.pending').' '.trans('messages.activation')}}</p>
                                        <h4 class="card-stats-number">{{\App\User::whereStatus('pending_activation')->count()}}</h4>
                                    </div>
                                    <div class="card-action blue-grey darken-2">
                                        <div id="profit-tristate" class="center-align"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!--card stats end-->
                    
                   <div>
       
            </div>


@stop

