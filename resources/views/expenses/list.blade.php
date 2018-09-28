@extends('layouts.materialize.default')

@section('breadcrumbs')
<h5 class="breadcrumbs-title">Expenses</h5>
<ol class="breadcrumbs">
    <li><a href="home">Home</a></li>
    <li><a href="expenses">Expenses</a></li>
    <li class="active">List</li>
</ol>

@stop

@section('content')

@include('common.materialize.header-form-link',['icon' => 'mdi-image-timer-auto','url'=>'expenses/create','buttonMessage'=>trans('messages.add_new'),'message'=>''])

@include('common.materialize.datatable',['table' => $table_data['expenses-table']])


@stop
