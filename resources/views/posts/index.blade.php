@extends('layout')

@section('contenido')
	<h1>Posts</h1>
	@if (session()->has('info'))
		<div class="alert alert-success">{{ session('info') }}</div>
	@endif
	<div class="container">
		@if (auth()->user()->hasRoles(['admin']))
			<div class="row justify-content-center">
				<div class="col-8 mx-auto my-2">
					<h3>Nueva publicación:</h3>
					<form action="{{ route('posts.store') }}" method="POST">
						{{ csrf_field() }}
						<fieldset class="form-group">
							<input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" id="title" name="title" placeholder="Titulo">
							{!! $errors->first('title', '<span class="error">:message</span>') !!}
						</fieldset>
						<fieldset class="form-group">
							<textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body" rows="4" placeholder="Contenido"></textarea>
							{!! $errors->first('body', '<span class="error">:message</span>') !!}
						</fieldset>
						<button class="btn btn-primary btn-block" type="submit">Publicar</button>
					</form>
				</div>
			</div>
			<hr>
			<h2>Publicaciones antiguas</h2>
		@endif
		<div class="row justify-content-center">
			@foreach ($posts as $post)
				<div class="col-8 mx-auto my-2">
					<div class="card bg-light">
						<div class="card-body">
							<h5 class="card-title font-weight-bold row justify-content-between">
								<div class="col-11">
									<a href="{{ route('posts.show', $post) }}" class="text-dark">
										{{ $post->title }}
									</a>
								</div>
								@if (auth()->user()->hasRoles(['admin']))
									<div class="col-auto">
										<form method="POST" action="{{ route('posts.destroy', $post->id) }}">
											{!! csrf_field() !!}
											{!! method_field('DELETE') !!}
											<button class="btn btn-danger btn-sm" type="submit">x</button>
										</form>
									</div>
								@endif
							</h5>
							{{ $post->body }}
							<footer class="blockquote-footer">
								{{ $post->user->name }}
							</footer>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection