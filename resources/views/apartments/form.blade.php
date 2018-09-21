{!! csrf_field() !!} 
			
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif


<div class="form-group">
	{!! Form::label('code', 'Identificador del Apartamento', ['for'=>'code']) !!}
	{!! Form::text('code', $apartment->code, ['class'=>'form-control','required'=>'required']) !!}
</div>

<div class="form-group">
	{!! Form::label('owner', 'Propietario', ['for'=>'owner']) !!}
	{!! Form::text('owner', $apartment->owner, ['class'=>'form-control','required'=>'required']) !!}
</div>

<div class="form-group">
	{!! Form::label('phone', 'Telefono', ['for'=>'phone']) !!}
	{!! Form::text('phone', $apartment->phone, ['class'=>'form-control','required'=>'required']) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'Correo electronico', ['for'=>'email'])!!}
	{!! Form::text('email', $apartment->email, ['class'=>'form-control','required'=>'required'])!!}
</div>

<div class="form-group">
	{!! Form::label('status', 'Status', ['for'=>'status']) !!}
	{!! Form::text('status', $apartment->status, ['class'=>'form-control','required'=>'required']) !!}
</div>

<div>
	{!! Form::submit('Registrar', ['class'=>'btn btn-primary']) !!}
</div>
