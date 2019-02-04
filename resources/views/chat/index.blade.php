@extends('layout')

@section('contenido')
	<h1>Chat</h1>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-8">
				@if (session()->has('confirm'))
					<div class="alert alert-success">{{ session('confirm') }}</div>
				@endif
				<hr>
				<h4>Nuevo mensaje</h4>
				<form action="{{ route('chat.store') }}" method="POST">
					{{ csrf_field() }}
					<div class="form-row">
						<div class="col">
							<select name="recipient_id" id="" class="form-control {{ $errors->has('recipient_id') ? 'is-invalid' : '' }}">
								<option value="">Selecciona el usuario</option>
								@foreach ($users as $user)
									<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endforeach
							</select>
							{!! $errors->first('recipient_id', '<span class="small text-danger">:message</span>') !!}
						</div>
						<div class="col-auto">
							<button class="btn btn-primary">Enviar</button>
						</div>
					</div>
				</form>
				<hr>
				<h4>Conversaciones</h4>
				<ul class="list-group">
					@foreach ($notifications as $notification)
						<a href="{{ route('chat.create', $notification->data['sender_id']) }}" class="list-group-item text-dark {{ is_null($notification->read_at) ? 'bg-light' : '' }}">
							<div class="font-weight-bold">
								{{ App\User::findOrFail($notification->data['sender_id'])->name }}
							</div>
							<span class="small">
								{{ $notification->data['body'] }}
							</span>
						</a>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endsection