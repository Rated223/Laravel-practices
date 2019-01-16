@extends('layout')

@section('contenido')

<h1>Usuarios</h1>
<a href="{{ route('usuarios.create') }}" class="btn btn-success float-right mb-3">Registrar Usuario</a>
<table class="table table-bordered table-striped table-sm">
	<thead class="thead-dark">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Rol</th>
			<th>Notas</th>
			<th>Etiquetas</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->present()->link() }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->present()->roles() }}</td>
				<td>{{ $user->present()->notes() }}</td>
				<td>{{ $user->present()->tags() }}</td>
				<td>
					<a class="btn btn-info btn-sm" href=" {{ route('usuarios.edit', $user->id) }}">Editar</a> 
					<form style="display:inline;" method="POST" action="{{ route('usuarios.destroy', $user->id) }}">
						{!! csrf_field() !!}
						{!! method_field('DELETE') !!}
						<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop