@extends('layout')

@section('contenido')

<h1>Todos los mensajes</h1>

<table class="table table-bordered table-striped table-sm">
	<thead class="thead-dark">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Mensaje</th>
			<th>Notas</th>
			<th>Etiquetas</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($mensajes as $mensaje)
			<tr>
				<td>{{ $mensaje->id }}</td>
				<td>{{ $mensaje->present()->userName() }}</td>
				<td>{{ $mensaje->present()->userEmail() }}</td>
				<td>{{ $mensaje->present()->link() }}</td>
				<td>{{ $mensaje->present()->notes() }}</td>
				<td>{{ $mensaje->present()->tags() }}</td>
				<td>
					<a class="btn btn-info btn-sm" href=" {{ route('mensajes.edit', $mensaje->id) }}">Editar</a> 
					<form style="display:inline;" method="POST" action="{{ route('mensajes.destroy', $mensaje->id) }}">
						{!! csrf_field() !!}
						{!! method_field('DELETE') !!}
						<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{{ $mensajes->appends(['sorted' => request('sorted')])->links('pagination::bootstrap-4') }}
@stop