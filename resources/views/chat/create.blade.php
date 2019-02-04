@extends('layout')

@section('contenido')
	<h1>{{ $sender->name }}</h1>
	<div class="row">
		<div class="col-12 bg-white rounded">
			<div class="mt-5">
				<div id="Chat" class="mx-5 border py-4 border border-info" style="height: 300px; min-height: 300px; overflow-y: auto; overflow-x: hidden;">
				@foreach ($chats as $chat)
					@if ($sender->id == $chat->sender_id)
						<div class="w-100">
							<div class="row px-4 my-1">
								<div class="col-auto text-white bg-secondary p-2 rounded">
									{{ $chat->body }}
								</div>
							</div>
						</div>
					@else
						<div class="w-100">
							<div class="row px-4 my-1 justify-content-end">
								<div class="col-auto text-white bg-info p-2 rounded">
									{{ $chat->body }}
								</div>
							</div>
						</div>
					@endif
				@endforeach
				</div>
				<form method="POST" action="{{ route('chat.store') }}">
					<div class="row border border-info mx-5">
						<div class="col-12 mt-1">
							{{ csrf_field() }}
							<textarea class="w-100 m-0" name="body" rows="1" style="border: 0;"></textarea>
							<input type="hidden" name="recipient_id" value="{{ $sender->id }}">
						</div>
						<div class="col-auto ml-auto mb-3">
							<button class="btn btn-info rounded-circle" type="submit">-></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection