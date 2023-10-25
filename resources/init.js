( function () {
	const Vue = require( 'vue' );
	const App = require( 'ext.vueTest.components' ).App;

	if ( Vue.configureCompat ) {
		Vue.configureCompat( {
			MODE: 3
		} );
	}

	Vue.createMwApp( App )
		.mount( '#vue-root' );
}() );
