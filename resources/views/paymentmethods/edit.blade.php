@extends('layouts.materialize.default')

@section('breadcrumbs')
<h5 class="breadcrumbs-title">{{ trans('messages.paymentmethods') }}</h5>
<ol class="breadcrumbs">
    <li><a href="/home">{!! trans('messages.home') !!}</a></li>
    <li><a href="/paymentmethods">{!! trans('messages.paymentmethods') !!}</a></li>
    <li class="active">{!! trans('messages.add_new').' '.trans('messages.paymentmethods') !!}</li>
</ol>

@stop

@section('content')

<form method="POST" action="/paymentmethods/{{$paymentmethod->id}}" id="form-paymentmethods-update">
	{{ method_field('PUT') }}
	@include('paymentmethods.form')
</form>

@stop