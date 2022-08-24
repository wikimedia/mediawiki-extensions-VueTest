<template>
	<section id="cdx-lookup">
		<h2>Lookup</h2>
		<cdx-lookup
			v-model:selected="selection"
			:menu-items="menuItems"
			:menu-config="menuConfig"
			@input="onInput"
		></cdx-lookup>
		<p class="cdx-docs-demo-text">
			Selected value: {{ selection }}
		</p>
	</section>
</template>

<script>
const { ref } = require( 'vue' );
const { CdxLookup } = require( '@wikimedia/codex' );
const vegetableItems = require( './lookup-examples.json' );

// @vue/component
module.exports = {
	components: {
		CdxLookup
	},
	setup() {
		const selection = ref( null );
		const menuItems = ref( [] );

		const menuConfig = {
			boldLabel: true
		};

		function onInput( value ) {
			if ( value ) {
				menuItems.value = vegetableItems.filter( ( item ) =>
					item.label.indexOf( value ) !== -1
				);
			}
		}

		return {
			selection,
			menuItems,
			menuConfig,
			onInput
		};
	}
};
</script>
