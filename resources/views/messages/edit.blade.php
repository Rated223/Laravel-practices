@extends('layout')

@section('contenido')
	<h1>Editar mensaje {{ $message->id }}</h1>
	<form method="POST" action="{{ route('mensajes.update', $message->id) }}">
		{!! method_field('PUT') !!}
		{!! csrf_field() !!}
		<p><label for="nombre">
			Nombre:
			<input type="text" name="nombre" placeholder="Nombre" value="{{ $message->nombre }}">
			{!! $errors->first('nombre', '<span class="error">:message</span>') !!}
		</label></p>
		<p><label for="email">
			Email:
			<input type="text" name="email" placeholder="Email" value="{{ $message->email }}">
			{!! $errors->first('email', '<span class="error">:message</span>') !!}
		</label></p>
		<p><label for="mensaje">
			Mensaje:
			<textarea name="mensaje" id="" cols="30" rows="10" placeholder="Mensaje">{{ $message->mensaje }}</textarea>
			{!! $errors->first('mensaje', '<span class="error">:message</span>') !!}
		</label></p>
		<input type="submit" value="ENVIAR">
	</form>
@endsection