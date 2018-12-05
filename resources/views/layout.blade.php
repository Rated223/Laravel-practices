<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/styles.css">
	<title>Mi sitio</title>
</head>
<body>
	<header>
		<?php
			function activeMenu($url) {
				return request()->is($url) ? 'active' : '';
			} 
		?>

		<nav class="navbar navbar-expand-md navbar-light bg-light border-dark border-bottom mb-4">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav w-100">
						<li class="nav-item">
							<a class="nav-link {{ activeMenu('/') }}" href="{{ route('home') }}">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ activeMenu('saludos/*') }}" href="{{ route('saludos', 'Daniel') }}">Saludo</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ activeMenu('mensajes/create') }}" href="{{ route('mensajes.create') }}">Contactos</a>
						</li>
						@if (auth()->check())
							<li class="nav-item">
								<a class="nav-link {{ activeMenu('mensajes*') }}" href="{{ route('mensajes.index') }}">Mensajes</a>
							</li>
							@if (auth()->user()->hasRoles(['admin']))
								<li class="nav-item">
									<a class="nav-link {{ activeMenu('usuarios*') }}" href="{{ route('usuarios.index') }}">Usuarios</a>
								</li>
							@endif
							<li class="nav-item ml-md-auto">
								<a class="nav-link" href="/logout">Cerrar sesion de {{ auth()->user()->name }}</a>
							</li>
						@else
							<li class="nav-item ml-md-auto">
								<a class="nav-link {{ activeMenu('login') }}" href="/login">Login</a>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<main class="container">
		@yield('contenido')
		<footer>Reservado {{ date('Y') }}</footer>
	</main>
	<script src="/js/app.js"></script>
</body>
</html>