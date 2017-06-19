@extends('layouts.materialize.default')

@section('breadcrumbs')
<h5 class="breadcrumbs-title">User</h5>
<ol class="breadcrumbs">
    <li><a href="user">User</a></li>
    <li><a href="#">Index</a></li>
    <li class="active">User</li>
</ol>

@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>{{trans('messages.list_all')}}</strong> {{trans('messages.user')}}
                @if(Entrust::can('create-user'))
                <div class="additional-btn">
                    <a href="/user/create" class="btn btn-sm btn-primary">{{trans('messages.add_new')}}</a>
                </div>
                @endif
            </div>
            <div class="panel-body full">
                @include('common.datatable',['table' => $table_data['user-table']])
            </div>
        </div>
    </div>
</div>
@stop

