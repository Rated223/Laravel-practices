@extends('layout')

@section('contenido')
	@if (session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif
	<h1>Editar usuario</h1>
	<img width="100px" src="{{ Storage::url($user->avatar) }}" alt="">
	<form method="POST" action="{{ route('usuarios.update', $user->id) }}" enctype="multipart/form-data">
		{!! method_field('PUT') !!}
		@include('users.form')
		<input class="btn btn-primary d-block" type="submit" value="Actualizar">
	</form>
@stop