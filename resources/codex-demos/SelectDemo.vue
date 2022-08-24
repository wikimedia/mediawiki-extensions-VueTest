<template>
	<section id="cdx-select">
		<h2>Select</h2>
		<cdx-select
			v-model:selected="selection"
			:menu-items="options"
			default-label="Choose an option"
		></cdx-select>
		<p>Selected value: {{ selection || '(none)' }}</p>
	</section>
</template>

<script>
const { ref } = require( 'vue' );
const { CdxSelect } = require( '@wikimedia/codex' );

// @vue/component
module.exports = {
	components: {
		CdxSelect
	},
	setup() {
		const options = [
			{ label: 'Apple', value: 'a' },
			{ label: 'Banana', value: 'b' },
			{ label: 'Canteloupe', value: 'c', disabled: true }
		];

		const selection = ref( null );

		return {
			options,
			selection
		};
	}
};
</script>
