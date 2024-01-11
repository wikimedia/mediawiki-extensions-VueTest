( function () {
	const Vue = require( 'vue' );
	const Sandbox = require( './Sandbox.vue' );

	Vue.createMwApp( Sandbox )
		.mount( '#vue-root' );
}() );
