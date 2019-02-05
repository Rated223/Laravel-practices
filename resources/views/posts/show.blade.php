@extends('layout')

@section('contenido')
	<h3>{{ $post->title }}</h3>
	<p>{{ $post->body }}</p>
	<span class="blockquote-footer"> Created at {{ $post->created_at }} by {{ $post->user->name }}</span>
	@if (auth()->user()->hasRoles(['admin']))
	<div class="row mt-3">
		<div class="col-auto">
			<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Editar</a>
		</div>
		<div class="col-auto">
			<form method="POST" action="{{ route('posts.destroy', $post->id) }}">
				{!! csrf_field() !!}
				{!! method_field('DELETE') !!}
				<button class="btn btn-danger" type="submit">Eliminar</button>
			</form>
		</div>
	</div>
	@endif
@endsection