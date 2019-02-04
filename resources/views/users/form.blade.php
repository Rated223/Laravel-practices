{!! csrf_field() !!}
<fieldset class="form-grupo">
	<label for="avatar">
		<input type="file" name="avatar">
	</label>
</fieldset>
<fieldset class="form-group">
	<label for="name">
		Nombre:
		<input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ $user->name or old('name') }}">
		{!! $errors->first('name', '<span class="error">:message</span>') !!}
	</label>
</fieldset>
<fieldset class="form-group">
	<label for="email">
		Email:
		<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email or old('email') }}">
		{!! $errors->first('email', '<span class="error">:message</span>') !!}
	</label>
</fieldset>
@unless ($user->id)
	<fieldset class="form-group">
		<label for="password">
			Password:
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
			{!! $errors->first('password', '<span class="error">:message</span>') !!}
		</label>
	</fieldset>
	<fieldset class="form-group">
		<label for="password_confirmation">
			Confirmar Password:
			<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password">
			{!! $errors->first('password_confirmation', '<span class="error">:message</span>') !!}
		</label>
	</fieldset>
@endunless
@foreach ($roles as $id => $name)
	<fieldset class="form-check form-check-inline">
		<label for="{{ $name }}">
			<input class="custom-checkbox" type="checkbox" id="{{ $name }}" value="{{ $id }}" name="roles[]" {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}>
			{{ $name }}
		</label>
	</fieldset>
@endforeach
{!! $errors->first('roles', '<span class="error">:message</span>') !!}