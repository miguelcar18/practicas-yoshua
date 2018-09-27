@extends('layouts.materialize.default')

@section('breadcrumbs')
<h5 class="breadcrumbs-title">Apartments</h5>
<ol class="breadcrumbs">
    <li><a href="home">Home</a></li>
    <li><a href="apartments">Apartments</a></li>
    <li class="active">List</li>
</ol>

@stop

@section('content')

@include('common.materialize.header-form-link',['icon' => 'mdi-image-timer-auto','url'=>'apartments/create','buttonMessage'=>trans('messages.add_new'),'message'=>''])

@include('common.materialize.datatable',['table' => $table_data['apartment-table']])


@stop

