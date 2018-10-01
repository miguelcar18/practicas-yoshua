@extends('layouts.materialize.default')

@section('breadcrumbs')
<h5 class="breadcrumbs-title">{{ trans('messages.expenses') .' '. trans('messages.list') }}</h5>
<ol class="breadcrumbs">
    <li><a href="home">Home</a></li>
    <li><a href="expenses">{{ trans('messages.expenses') }}</a></li>
    <li class="active">{{ trans('messages.list') }}</li>
</ol>

@stop

@section('content')

@include('common.materialize.header-form-link',['icon' => 'mdi-action-description','url'=>'expenses/create','buttonMessage'=>trans('messages.add_new'),'message'=>''])

@include('common.materialize.datatable',['table' => $table_data['expenses-table']])


@stop