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





{{--<div class="panel-heading"><strong>{{trans('messages.list_all')}}</strong> {{trans('messages.user')}}
@if(Entrust::can('create-user'))
<div class="additional-btn">
    <a href="/user/create" class="btn btn-sm btn-primary">{{trans('messages.add_new')}}</a>
</div>
@endif
</div>--}}

@include('common.materialize.datatable',['table' => $table_data['user-table']])




@stop
@section('scripts')

@stop