@extends('layout')

@section('contenido')
	<h1>Crear usuario</h1>
	<form method="POST" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
		@include('users.form', ['user' => new App\User])
		<input class="btn btn-primary d-block" type="submit" value="Guardar">
	</form>
@endsection