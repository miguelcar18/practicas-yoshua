@extends('layouts.materialize.default')

@section('breadcrumbs')
<h5 class="breadcrumbs-title">{{ trans('messages.paymentmethods') .' '. trans('messages.list') }}</h5>
<ol class="breadcrumbs">
    <li><a href="home">Home</a></li>
    <li><a href="paymentmethods">{{ trans('messages.paymentmethods') }}</a></li>
    <li class="active">{{ trans('messages.list') }}</li>
</ol>

@stop

@section('content')

@include('common.materialize.header-form-link',['icon' => 'mdi-editor-attach-money','url'=>'paymentmethods/create','buttonMessage'=>trans('messages.add_new'),'message'=>''])

@include('common.materialize.datatable',['table' => $table_data['paymentmethods-table']])


@stop