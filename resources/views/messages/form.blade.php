<input type="hidden" name="_token" value ="{{ csrf_token() }}">
@if ($showFields)
	<fieldset class="form-group">
		<label for="nombre">
			Nombre:
			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ $message->nombre or old('nombre') }}">
			{!! $errors->first('nombre', '<span class="error">:message</span>') !!}
		</label>
	</fieldset>
	<fieldset class="form-group">
		<label for="email">
			Email:
			<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $message->email ?? old('email') }}">
			{!! $errors->first('email', '<span class="error">:message</span>') !!}
		</label>
	</fieldset>
@endif

<fieldset class="form-group">
	<label for="mensaje">
		Mensaje:
		<textarea class="form-control" id="mensaje" name="mensaje" id="" cols="30" placeholder="Mensaje">{{ $message->mensaje or old('mensaje') }}</textarea>
		{!! $errors->first('mensaje', '<span class="error">:message</span>') !!}
	</label>
</fieldset>
<input class="btn btn-primary" type="submit" value="{{ $btnText ?? 'Guardar' }}">