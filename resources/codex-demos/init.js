( function () {
	const Vue = require( 'vue' );
	const Sandbox = require( './Sandbox.vue' );

	if ( Vue.configureCompat ) {
		Vue.configureCompat( {
			MODE: 3
		} );
	}

	Vue.createMwApp( Sandbox )
		.mount( '#vue-root' );
}() );
