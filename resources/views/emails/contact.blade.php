<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mensaje recibido</title>
</head>
<body>
	<h1>Te responderemos a la brevedad posible</h1>
	<p>
		Nombre: {{ $data->nombre }} <br>
		Email: {{ $data->email }} <br>
		Mensaje: {{ $data->mensaje }} <br>
	</p>
</body>
</html>