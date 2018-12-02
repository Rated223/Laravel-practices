@extends('layout')

@section('contenido')

<h1>Todos los mensajes</h1>

<table width="100%" border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Mensaje</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($mensajes as $mensaje)
			<tr>
				<td>{{ $mensaje->id }}</td>
				<td>
					<a href="{{ route('mensajes.show', $mensaje->id) }}">
					{{ $mensaje->nombre }}</a>
				</td>
				<td>{{ $mensaje->email }}</td>
				<td>{{ $mensaje->mensaje }}</td>
				<td>
					<a href=" {{ route('mensajes.edit', $mensaje->id) }}">Editar</a> 
					<form style="display:inline;" method="POST" action="{{ route('mensajes.destroy', $mensaje->id) }}">
						{!! csrf_field() !!}
						{!! method_field('DELETE') !!}
						<button type="submit">Eliminar</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop