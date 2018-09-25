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

<div class="col s8 m8 l6">
	<div class="card-panel">
		<div class="row">

			<div class="col-sm-6">
			    
			    <div class="input-field col s6">
			        <i class="material-icons prefix">person</i>
					<input type="text" name="owner" class="form-control validate" required="required" id="owner" value="{{$apartment->owner}}">
					<label>Propietario</label>
			    </div>

			    <div class="input-field col s6">
					<i class="material-icons prefix">store</i>
					<input type="text" name="code" class="form-control validate" required="required" id="code" value="{{$apartment->code}}">
					<label>Identificador de Apartamento</label>
				</div>

				<div class="input-field col s6">
					<i class="material-icons prefix">phone</i>
					<input type="text" name="phone" class="form-control validate" required="required" id="phone" value="{{$apartment->phone}}">
					<label>Telefono</label>
				</div>


				<div class="input-field col s6">
					<i class="material-icons prefix">email</i>
					<input type="email" name="email" class="form-control validate" required="required" id="email" value="{{$apartment->email}}">
					<label>Correo electronico</label>
				</div>
					  
				<div class="input-field col s6">
					<select name="status" class="form-control" required="required" id="status" >
						  <option value="" disabled selected:""></option>
						  <option value="1">Activo</option>
						  <option value="0">Inactivo</option>
					</select>
					<label>Selecciona el estatus</label>
				</div>

				<div class="input-field col s6">
					<button class="btn waves-effect waves-light" type="submit" name="action">Enviar
						<i class="material-icons right">send</i>
					</button>	
				</div>


				
			</div>

		</div>
