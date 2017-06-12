@extends('layouts.default')

	@section('breadcrumb')
        <div class="row">
			<ul class="breadcrumb">
			    <li><a href="/home">{!! trans('messages.home') !!}</a></li>
			    <li class="active">{!! trans('messages.language') !!}</li>
			</ul>
		</div>
	@stop
	
	@section('content')
		<div class="row">
			<div class="col-sm-4">
				<div class="panel panel-default">
                    <div class="panel-heading">
					<strong>{!! trans('messages.add_new') !!}</strong> {!! trans('messages.word') !!}
					</div>
					<div class="panel-body">
						{!! Form::open(['route' => 'language.add-words','role' => 'form', 'class'=>'language-entry-form','id' => 'language-entry-form']) !!}
								  
				  		  <div class="form-group">
						    {!! Form::label('text',trans('messages.key'),[])!!}
							{!! Form::input('text','key','',['class'=>'form-control','placeholder'=>trans('messages.key')])!!}
						  </div>
				  		  <div class="form-group">
						    {!! Form::label('text',trans('messages.word_or_sentence'),[])!!}
							{!! Form::input('text','text','',['class'=>'form-control','placeholder'=>trans('messages.word_or_sentence')])!!}
						  </div>
				  		  <div class="form-group">
						    {!! Form::label('module',trans('messages.module'),[])!!}
							{!! Form::input('text','module','',['class'=>'form-control','placeholder'=>trans('messages.module')])!!}
						  </div>
						{!! Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary']) !!}
						{!! Form::close() !!}
					</div>
				</div>
				<div class="panel panel-default">
                    <div class="panel-heading">
					<strong>{!! trans('messages.add_new') !!}</strong> {!! trans('messages.language') !!}
					</div>
					<div class="panel-body">
						{!! Form::open(['route' => 'language.store','role' => 'form', 'class'=>'language-form','id' => 'language-form']) !!}
							@include('language._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="panel panel-default">
                    <div class="panel-heading">
						<strong>{!! trans('messages.list_all') !!}</strong> {!! trans('messages.language') !!}
					</div>
					<div class="panel-body full">
						@include('common.datatable',['table' => $table_data['language-table']])
					</div>
				</div>
			</div>
		</div>
	@stop