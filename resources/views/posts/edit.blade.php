@extends('layout')

@section('contenido')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8 mx-auto my-2">
				<h3>Publicación:</h3>
				<form action="{{ route('posts.update', $post->id) }}" method="POST">
					{{ csrf_field() }}
					{!! method_field('PUT') !!}
					<fieldset class="form-group">
						<input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" id="title" name="title" placeholder="Titulo" value="{{ $post->title }}">
						{!! $errors->first('title', '<span class="error">:message</span>') !!}
					</fieldset>
					<fieldset class="form-group">
						<textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body" rows="4" placeholder="Contenido">{{ $post->body }}</textarea>
						{!! $errors->first('body', '<span class="error">:message</span>') !!}
					</fieldset>
					<button class="btn btn-primary btn-block" type="submit">Actualizar</button>
				</form>
			</div>
		</div>
	</div>
@endsection