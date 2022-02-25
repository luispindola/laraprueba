@extends('layout.fixednavbar')

@section('contenido')
	<h1>Datos de usuario {{$user->id}}</h1>										

		<div class="mb-3">
		  <label for="nombre" class="form-label">Nombre:</label>
		  <p><strong>{{$user->name}}</strong></p>
		</div>

		<div class="mb-3">
		  <label for="email" class="form-label">Correo electrónico:</label>
		  <p><strong>{{$user->email}}</strong></p>
		</div>

		<div class="mb-3">
		  <label for="password" class="form-label">Contraseña:</label>
		  <p><strong>{{Crypt::decrypt($user->password,0)}}</strong></p>
		</div>

		<form name="form1" 
		role="form" 
		method="post" 
		action="{{url('/usuarios/'.$user->id)}}">
		<div class="mb-3">
		  @csrf
		  @method('DELETE')
		  <a class="btn btn-primary mb-3" href="{{url('/')}}">Regresar</a>
		  <button type="submit" class="btn btn-warning mb-3">Eliminar usuario</button>
		</div>
		</form>
	
@endsection