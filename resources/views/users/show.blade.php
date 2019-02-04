@extends('layout')

@section('contenido')
	<h1>Perfil {{ $user->id }}</h1>
	<img width="100px" src="{{ Storage::url($user->avatar) }}" alt="">
	<table class="table table-sm">
		<tr>
			<th>Nombre</th>
			<td>{{ $user->name }}</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{ $user->email }}</td>
		</tr>
		<tr>
			<th>Roles</th>
			<td>
				<ul class="p-1 m-0">
					@foreach ($user->roles as $role)
						<li>{{ $role->display_name }}</li>
					@endforeach
				</ul>
			</td>
		</tr>
	</table>
	@can('edit', $user)
		<a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-info">Editar</a>
	@endcan
	@can('destroy', $user)
	    <form style="display:inline;" method="POST" action="{{ route('usuarios.destroy', $user->id) }}">
			{!! csrf_field() !!}
			{!! method_field('DELETE') !!}
			<button class="btn btn-danger" type="submit">Eliminar</button>
		</form>
	@endcan
@endsection