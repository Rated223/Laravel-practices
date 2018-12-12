@extends('layout')

@section('contenido')
	@if (session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif
	<h1>Editar usuario</h1>
	<form method="POST" action="{{ route('usuarios.update', $user->id) }}">
		{!! method_field('PUT') !!}
		@include('users.form')
		<input class="btn btn-primary d-block" type="submit" value="Actualizar">
	</form>
@stop