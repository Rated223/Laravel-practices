@extends('layout')

@section('contenido')
	<h1>Login</h1>
	<!--Rename carpet-->
	<form class="form-inline" action="/login" method="POST">
		{!! csrf_field() !!}
		<input class="form-control mr-1" type="email" name="email" placeholder="Email">
		<input class="form-control mr-1" type="password" name="password" placeholder="Contraseña">
		<input class="btn btn-primary" type="submit" value="Entrar">
		<a class="ml-2" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
	</form>
	<br>
@endsection