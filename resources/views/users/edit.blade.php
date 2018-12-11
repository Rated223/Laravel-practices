@extends('layout')

@section('contenido')
	@if (session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif
	<h1>Editar usuario</h1>
	<form method="POST" action="{{ route('usuarios.update', $user->id) }}">
		{!! method_field('PUT') !!}
		{!! csrf_field() !!}
		<fieldset class="form-group">
			<label for="name">
				Nombre:
				<input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ $user->name }}">
				{!! $errors->first('nombre', '<span class="error">:message</span>') !!}
			</label>
		</fieldset>
		<fieldset class="form-group">
			<label for="email">
				Email:
				<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
				{!! $errors->first('email', '<span class="error">:message</span>') !!}
			</label>
		</fieldset>
		<input class="btn btn-primary" type="submit" value="ENVIAR">
	</form>
@stop