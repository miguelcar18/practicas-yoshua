@extends('layouts.default')

	@section('breadcrumb')
		<div class="row">
			<ul class="breadcrumb">
			    <li><a href="/home">{!! trans('messages.home') !!}</a></li>
			    <li><a href="/language">{!! trans('messages.language') !!}</a></li>
			    <li class="active">{!! config('lang.'.$locale.'.language') !!}</li>
			</ul>
		</div>
	@stop
	
	@section('content')
		<div class="row">
			<div class="col-xs-2">
			    <ul class="nav nav-tabs tabs-left">
			      <li class="active"><a href="#plugin" data-toggle="tab">{{trans('messages.plugin')}}</a></li>
			      @foreach($modules as $module)
				  	<li><a href="#_{{ $module }}" data-toggle="tab"> {!! trans('messages.'.$module) !!} ({{ $word_count[$module] }})</a></li>
				  @endforeach
			    </ul>
			</div>
			<div class="col-xs-10">
			    <div class="tab-content">
			      	<div class="tab-pane active" id="plugin">
						<div class="panel panel-default">
							<div class="panel-heading">
                    			<strong>{!! trans('messages.plugin') !!}</strong>
                    		</div>
                    		<div class="panel-body">
						    	{!! Form::model($language,['method' => 'PATCH','route' => ['language.plugin',$locale] ,'class' => 'language-plugin-form','id'=>'language-plugin-form','data-no-form-clear' => 1]) !!}
								  <div class="form-group">
								    {!! Form::label('datatable',trans('messages.table').' '.trans('messages.language'),[])!!}
									{!! Form::select('datatable', config('lang_datatable'),isset($locale) ? config('lang.'.$locale.'.datatable') : '',['class'=>'form-control input-xlarge show-tick','title'=>trans('messages.select_one')])!!}
								  </div>
								  <div class="form-group">
								    {!! Form::label('calendar',trans('messages.calendar').' '.trans('messages.language'),[])!!}
									{!! Form::select('calendar', config('lang_calendar'),isset($locale) ? config('lang.'.$locale.'.calendar') : '',['class'=>'form-control input-xlarge show-tick','title'=>trans('messages.select_one')])!!}
								  </div>
								  <div class="form-group">
								    {!! Form::label('datepicker',trans('messages.datepicker').' '.trans('messages.language'),[])!!}
									{!! Form::select('datepicker', config('lang_datepicker'),isset($locale) ? config('lang.'.$locale.'.datepicker') : '',['class'=>'form-control input-xlarge show-tick','title'=>trans('messages.select_one')])!!}
								  </div>
								  <div class="form-group">
								    {!! Form::label('datetimepicker',trans('messages.datetimepicker').' '.trans('messages.language'),[])!!}
									{!! Form::select('datetimepicker', config('lang_datetimepicker'),isset($locale) ? config('lang.'.$locale.'.datetimepicker') : '',['class'=>'form-control input-xlarge show-tick','title'=>trans('messages.select_one')])!!}
								  </div>
								  <div class="form-group">
								    {!! Form::label('validation',trans('messages.validation').' '.trans('messages.language'),[])!!}
									{!! Form::select('validation', config('lang_validation'),isset($locale) ? config('lang.'.$locale.'.validation') : '',['class'=>'form-control input-xlarge show-tick','title'=>trans('messages.select_one')])!!}
								  </div>
								{!! Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary pull-right']) !!}
								{!! Form::close() !!}
                    		</div>
                    	</div>
                    </div>
			      @foreach($modules as $module)
					<div class="tab-pane" id="_{{ $module }}">
						<div class="panel panel-default">
                    		<div class="panel-heading">
                    			<strong>{{ trans('messages.'.$module) }}</strong> {{ trans('messages.translation') }}
                    		</div>
                    		<div class="panel-body">
					    		{!! Form::model($language,['method' => 'PATCH','route' => ['language.update-translation',$locale] ,'class' => 'form-horizontal','id'=>'language_translation_'.$module, 'data-no-form-clear' => 1]) !!}
								@foreach($words as $key => $word)
									@if($word['module'] == $module)
									<div class="form-group">
								    	{!! Form::label($key,$word['value'],['class'=>'col-sm-6 control-label pull-left'])!!}
										<div class="col-sm-6">
											@if($locale == 'en')
											{!! Form::input('text',$key,(array_key_exists($key, $translation)) ? $translation[$key] : $word['value'],['class'=>'form-control','placeholder'=>trans('messages.translation')])!!}
											@else
											{!! Form::input('text',$key,(array_key_exists($key, $translation)) ? $translation[$key] : '',['class'=>'form-control','placeholder'=>trans('messages.translation')])!!}
											@endif
										</div>
								  	</div>
								  	@endif
								@endforeach
								{!! Form::hidden('module',$module) !!}
								{!! Form::submit(trans('messages.save'),['class' => 'btn btn-primary pull-right']) !!}
								{!! Form::close() !!}
                    		</div>
                    	</div>
					</div>
				  @endforeach
			    </div>
			</div>  
		</div>

	@stop