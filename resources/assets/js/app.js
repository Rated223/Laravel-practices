
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

$('form').on('submit', function(){
	$(this).find('input[type=submit]').attr('disabled', true);
});

Echo.channel('messages-channel')
	.listen('MessageWasRecived', (data) => {
		let message = data.message;
		let html = `
			<tr>
				<td>${message.id}</td>
				<td>${message.nombre}</td>
				<td>${message.email}</td>
				<td>${message.mensaje}</td>
				<td></td>
				<td></td>
				<td>
					<a class="btn btn-info btn-sm" href="/mensajes/${message.id}/edit">Editar</a> 
					<form style="display:inline;" method="POST" action="/mensajes/${message.id}">
						<input type="hidden" name="_token" value="${Laravel.csrfToken}" />
						<input type="hidden" name="_method" value="DELETE" />
						<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
					</form>
				</td>
			</tr>
			`;
		$(html).prependTo('tbody');
	})
