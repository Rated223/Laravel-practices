@extends('layout')

@section('contenido')
	<h1>home</h1>
	@if (session()->has('info'))
		<h3 class="text-danger">{{ session('info') }}</h3>
		<br>
	@endif
@stop