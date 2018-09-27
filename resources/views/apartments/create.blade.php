@extends('layouts.materialize.default')

@section('breadcrumbs')
<h5 class="breadcrumbs-title">Apartments</h5>
<ol class="breadcrumbs">
    <li><a href="/home">{!! trans('messages.home') !!}</a></li>
    <li><a href="/apartments">{!! trans('messages.apartments') !!}</a></li>
    <li class="active">{!! trans('messages.add_new').' '.trans('messages.apartments') !!}</li>
</ol>

@stop

@section('content')

<form method="POST" action="/apartments" id="form-apartments-store">
	@include('apartments.form')
</form>

@stop