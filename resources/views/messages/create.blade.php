@extends('layout')

@section('contenido')	
	<h1>contacto</h1>
	<h2>Escribeme</h2>
	@if (session()->has('info'))
		<h3>{{ session('info') }}</h3>
	@else
	<form method="POST" action="{{ route('mensajes.store') }}">
		<input type="hidden" name="_token" value ="{{ csrf_token() }}">
		
		<p><label for="nombre">
			Nombre:
			<input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
			{!! $errors->first('nombre', '<span class="error">:message</span>') !!}
		</label></p>
		<p><label for="email">
			Email:
			<input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
			{!! $errors->first('email', '<span class="error">:message</span>') !!}
		</label></p>
		<p><label for="mensaje">
			Mensaje:
			<textarea name="mensaje" id="" cols="30" rows="10" placeholder="Mensaje">{{ old('mensaje') }}</textarea>
			{!! $errors->first('mensaje', '<span class="error">:message</span>') !!}
		</label></p>
		<input type="submit" value="ENVIAR">
	</form>
	@endif
	<hr>
@stop