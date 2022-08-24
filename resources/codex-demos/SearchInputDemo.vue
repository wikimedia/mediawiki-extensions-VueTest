<template>
	<section id="cdx-search-input">
		<h2>Search Input</h2>
		<div>
			<cdx-search-input
				v-model="inputValue"
				placeholder="Search"
				@update:model-value="onUpdateModelValue"
			></cdx-search-input>
		</div>
	</section>
</template>

<script>
const { ref } = require( 'vue' );
const { CdxSearchInput } = require( '@wikimedia/codex' );

// @vue/component
module.exports = {
	components: {
		CdxSearchInput
	},
	setup() {
		const inputValue = ref( '' );

		function onUpdateModelValue( newValue ) {
			// eslint-disable-next-line no-console
			console.log( 'update:modelValue', newValue );
		}

		return {
			inputValue,
			onUpdateModelValue
		};
	}
};
</script>
