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
{{--
@include('common.materialize.header-form-link',['icon' => 'mdi-image-timer-auto','url'=>'/apartments','buttonMessage'=>trans('messages.list_all'),'message'=>trans('messages.add_new')])
--}}

{{$apartment->status}}
<form method="POST" action="/apartments/{{$apartment->id}}" id="form-apartments-update">
	{{ method_field('PUT') }}
	@include('apartments.form')

</form>

@stop
