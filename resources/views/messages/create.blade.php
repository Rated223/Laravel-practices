@extends('layout')

@section('contenido')	
	<h1>contacto</h1>
	<h2>Escribeme</h2>
	@if (session()->has('info'))
		<h3>{{ session('info') }}</h3>
	@else
	<form method="POST" action="{{ route('mensajes.store') }}">
		<input type="hidden" name="_token" value ="{{ csrf_token() }}">
		
		<fieldset class="form-group">
			<label for="nombre">
				Nombre:
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
				{!! $errors->first('nombre', '<span class="error">:message</span>') !!}
			</label>
		</fieldset>
		<fieldset class="form-group">
			<label for="email">
				Email:
				<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
				{!! $errors->first('email', '<span class="error">:message</span>') !!}
			</label>
		</fieldset>
		<fieldset class="form-group">
			<label for="mensaje">
				Mensaje:
				<textarea class="form-control" id="mensaje" name="mensaje" id="" cols="30" placeholder="Mensaje">{{ old('mensaje') }}</textarea>
				{!! $errors->first('mensaje', '<span class="error">:message</span>') !!}
			</label>
		</fieldset>
		<input class="btn btn-primary" type="submit" value="ENVIAR">
	</form>
	@endif
	<hr>
@stop