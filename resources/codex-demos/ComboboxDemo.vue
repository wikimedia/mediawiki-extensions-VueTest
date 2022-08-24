<template>
	<section id="cdx-combobox">
		<h2>Combobox</h2>
		<cdx-combobox
			v-model:selected="selection"
			:menu-items="options"
			placeholder="Type or choose an option"
			:disabled="false"
			:clearable="true"
		></cdx-combobox>
		<p>Selected value: {{ selection || '(none)' }}</p>
	</section>
</template>

<script>
const { ref } = require( 'vue' );
const { CdxCombobox } = require( '@wikimedia/codex' );

// @vue/component
module.exports = {
	components: {
		CdxCombobox
	},
	setup() {
		const options = [
			{ label: 'Apple', value: 'a' },
			{ label: 'Banana', value: 'b' },
			{ label: 'Canteloupe', value: 'c', disabled: true }
		];

		const selection = ref( '' );

		return {
			options,
			selection
		};
	}
};
</script>
