@extends('layout')

@section('contenido')
	<h1>saludos para {{ $nombre }}</h1>
	{!! $html !!}
	<ul>


		<!--@if (count($consolas) === 1)
			<p>Solo tienes una consola</p>
		@elseif (count($consolas) > 1)
			<p>Tienes varias consolas</p>
		@else
			<p>No tienes ninguna consola</p>
		@endif-->

		@forelse ($consolas as $consola)
			<li>{{ $consola }}</li>
		@empty
			<p>esta vacio</p>
		@endforelse


	</ul>
@stop