const VueTestUtils = require( '@vue/test-utils' );
const App = require( './App.vue' );

describe( 'App', () => {
	const wrapper = VueTestUtils.shallowMount( App );

	it( 'contains an H1 element', () => {
		expect( wrapper.find( 'h1' ).exists() ).toBe( true );
	} );

	it( 'contains a p element', () => {
		expect( wrapper.find( 'p' ).exists() ).toBe( true );
	} );
} );
