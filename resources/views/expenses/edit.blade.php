@extends('layouts.materialize.default')

@section('breadcrumbs')
<h5 class="breadcrumbs-title">{{ trans('messages.expenses') }}</h5>
<ol class="breadcrumbs">
    <li><a href="/home">{!! trans('messages.home') !!}</a></li>
    <li><a href="/expenses">{!! trans('messages.expenses') !!}</a></li>
    <li class="active">{!! trans('messages.add_new').' '.trans('messages.expenses') !!}</li>
</ol>

@stop

@section('content')

<form method="POST" action="/expenses/{{$expense->id}}" id="form-expenses-update">
	{{ method_field('PUT') }}
	@include('expenses.form')
</form>

@stop