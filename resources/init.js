( function () {
	var Vue = require( 'vue' );
	var App = require( 'ext.vueTest.components' ).App;

	Vue.configureCompat( {
		MODE: 3
	} );

	Vue.createMwApp( App )
		.mount( '#vue-root' );
}() );
