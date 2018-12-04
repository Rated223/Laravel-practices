<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style>
		.active {
			text-decoration: none;
			color: #3E9E45;
		}

		.error {
			color: #D80000;
			font-size: 12px;
		}
	</style>
	<title>Mi sitio</title>
</head>
<body>
	<header>
		<?php
			function activeMenu($url) {
				return request()->is($url) ? 'active' : '';
			} 
		?>
		<!--<h1>{{ request()->is('/') ? 'Estas en el home' : 'No estas en el home' }}</h1>-->
		<nav>
			<a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Home</a>
			<a class="{{ activeMenu('saludos/*') }}" href="{{ route('saludos', 'Daniel') }}">Saludo</a>
			<a class="{{ activeMenu('mensajes/create') }}" href="{{ route('mensajes.create') }}">Contactos</a>
			@if (auth()->check())
				<a class="{{ activeMenu('mensajes') }}" href="{{ route('mensajes.index') }}">Mensajes</a>
				<a href="/logout">Cerrar sesion de {{ auth()->user()->name }}</a>
			@endif
			@if (auth()->guest())
				<a class="{{ activeMenu('login') }}" href="/login">Login</a>
			@endif
		</nav>
	</header>
	@yield('contenido')
	<footer>Reservado {{ date('Y') }}</footer>
</body>
</html>