<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mensaje recibido desde {{ env('APP_URL') }}</title>
</head>
<body>
	<h1>Mensaje recibido desde {{ env('APP_URL') }}</h1>
	<p>
		Nombre: {{ $data->nombre }} <br>
		Email: {{ $data->email }} <br>
		Mensaje: {{ $data->mensaje }} <br>
	</p>
</body>
</html>