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
					<label>{{ trans('messages.owner') }}</label>
			    </div>

			    <div class="input-field col s6">
					<i class="material-icons prefix">home</i>
					<input type="text" name="code" class="form-control validate" required="required" id="code" value="{{$apartment->code}}">
					<label>{{ trans('messages.code') }}</label>
				</div>

				<div class="input-field col s6">
					<i class="material-icons prefix">phone</i>
					<input type="text" name="phone" class="form-control validate" required="required" id="phone" value="{{$apartment->phone}}">
					<label>{{ trans('messages.phone') }}</label>
				</div>


				<div class="input-field col s6">
					<i class="material-icons prefix">email</i>
					<input type="email" name="email" class="form-control validate" required="required" id="email" value="{{$apartment->email}}">
					<label>{{ trans('messages.email') }}</label>
				</div>
					  
				<div class="input-field col s6">
					<select name="status" class="form-control" required="required" id="status" >
						  <option value="" disabled ></option>
						  <option value="1">{{ trans('messages.active') }}</option>
						  <option value="0">{{ trans('messages.inactive') }}</option>
					</select>
					<label>{{ trans('messages.status') }}</label>
				</div>

				<div class="input-field col s6">
					<button class="btn waves-effect waves-light" type="submit" name="action">{{ trans('messages.save') }}
						<i class="material-icons right">send</i>
					</button>	
				</div>


				
			</div>

		</div>
