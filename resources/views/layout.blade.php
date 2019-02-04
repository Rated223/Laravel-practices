<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/styles.css">
	<script>
		window.Laravel = {!! json_encode([
			'csrfToken' => csrf_token(),
		]) !!};
	</script>
	<title>Mi sitio</title>
</head>
<body>
	<header>
		<?php
			function activeM($url) {
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
							<a class="nav-link {{ activeM('/') }}" href="{{ route('home') }}">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ activeM('saludos/*') }}" href="{{ route('saludos', 'Daniel') }}">Saludo</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ activeM('mensajes/create') }}" href="{{ route('mensajes.create') }}">Contactos</a>
						</li>
						@if (auth()->check())
							<li class="nav-item">
								<a class="nav-link {{ activeM('mensajes*') }}" href="{{ route('mensajes.index') }}">Mensajes</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ activeM('chat*') }}" href="{{ route('chat.index') }}">
									Chat
									@if ($count = Auth::user()->unreadNotifications->count())
										<span class="badge badge-pill badge-dark">{{ $count }}</span>
									@endif
								</a>
							</li>
							@if (auth()->user()->hasRoles(['admin']))
								<li class="nav-item">
									<a class="nav-link {{ activeM('usuarios*') }}" href="{{ route('usuarios.index') }}">Usuarios</a>
								</li>
							@endif
							<li class="nav-item dropdown ml-md-auto">
								<a class="nav-link dropdown-toggle" href="#" id="menuUusuario" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          		{{ auth()->user()->name }}
						        </a>
								<div class="dropdown-menu" aria-labelledby="menuUusuario">
									<a class="dropdown-item" href="/usuarios/{{ auth()->id() }}/edit">Cuenta</a>
									<a class="dropdown-item" href="/logout">Cerrar sesion</a>
						        </div>
							</li>
						@else
							<li class="nav-item ml-md-auto">
								<a class="nav-link {{ activeM('login') }}" href="/login">Login</a>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<main class="container">
		@yield('contenido')
		<hr>
		<footer>Reservado {{ date('Y') }}</footer>
	</main>
	<script src="/js/app.js"></script>
</body>
</html>