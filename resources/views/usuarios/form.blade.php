@extends('layout.fixednavbar')

@section('contenido')
	<h1>@if(isset($user))
		Edita Usuario
	@else
		Nuevo Usuario
	@endif</h1>
	<form 
		name="form1" 
		role="form" 
		method="post" 
		@if(isset($user)){{-- varia el url del acction dependiendo si esta editando o creando --}}
			action="{{url('/usuarios/'.$user->id.'/edit')}}">
		@else
			action="{{url('/usuarios')}}">
		@endif
		
		@csrf

		@if(isset($user))
			{{-- Solo cuando se va a editar --}}
			@method('PUT')
		@endif
		
		@if ($errors->any())
		    <div class="alert alert-danger alert-dismissable">
		    	<button type="button" class="close" data-dismiss="alert">&times;</button>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		<div class="mb-3">
		  <label for="nombre" class="form-label">Nombre:</label>
		  <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" 
		  name="nombre" 
		  value="@if(isset($user)){{$user->name}}@else{{old('nombre')}}@endif" 
		  placeholder="Nombre de usuario">
		  @error('nombre')<div class="alert alert-danger">{{ $message }}</div>@enderror
		</div>

		<div class="mb-3">
		  <label for="email" class="form-label">Correo electrónico:</label>
		  <input type="mail" class="form-control @error('email') is-invalid @enderror" id="email" 
		  name="email"
		  value="@if(isset($user)){{$user->email}}@else{{old('email')}}@endif" 
		  placeholder="Correo electrónico">
		  @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror
		</div>

		<div class="mb-3">
		  <label for="password" class="form-label">Contraseña:</label>
		  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" 
		  name="password"
		  value="@if(isset($user)){{Crypt::decrypt($user->password,0)}}@else{{old('password')}}@endif" 
		  placeholder="Contraseña">
		  @error('password')<div class="alert alert-danger">{{ $message }}</div>@enderror
		</div>

		<div class="mb-3">
		  <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
		  <input type="password" class="form-control @error('password2') is-invalid @enderror" id="password_confirmation" 
		  name="password_confirmation"
		  value="@if(isset($user)){{Crypt::decrypt($user->password,0)}}@else{{old('password_confirmation')}}@endif" 
		  placeholder="Confirmar Contraseña">
		  @error('password_confirmation')<div class="alert alert-danger">{{ $message }}</div>@enderror
		</div>
		
		<div class="mb-3">	 
		  <button type="submit" class="btn btn-primary mb-3">Crear usuario</button>
		</div>
	</form>

@endsection