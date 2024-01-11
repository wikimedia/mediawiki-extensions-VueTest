( function () {
	const Vue = require( 'vue' );
	const App = require( 'ext.vueTest.components' ).App;

	Vue.createMwApp( App )
		.mount( '#vue-root' );
}() );
