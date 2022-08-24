<template>
	<section id="cdx-checkbox">
		<h2>Checkboxes</h2>
		<cdx-checkbox
			v-for="option in options"
			:key="option.value"
			v-model="multiSelection"
			:input-value="option.value"
		>
			{{ option.label }}
		</cdx-checkbox>
		<p>Selected values: {{ multiSelection.join( ', ' ) || '(none)' }}</p>
	</section>
</template>

<script>
const { ref } = require( 'vue' );
const { CdxCheckbox } = require( '@wikimedia/codex' );

// @vue/component
module.exports = {
	components: {
		CdxCheckbox
	},
	setup() {
		const options = [
			{ label: 'Apple', value: 'a' },
			{ label: 'Banana', value: 'b' },
			{ label: 'Canteloupe', value: 'c', disabled: true }
		];

		const multiSelection = ref( [] );

		return {
			options,
			multiSelection
		};
	}
};
</script>
