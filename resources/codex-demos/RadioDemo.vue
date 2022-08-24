<template>
	<section id="cdx-radio">
		<h2>Radios</h2>
		<cdx-radio
			v-for="option in options"
			:key="option.value"
			v-model="selection"
			:input-value="option.value"
		>
			{{ option.label }}
		</cdx-radio>
		<p>Selected value: {{ selection || '(none)' }}</p>
	</section>
</template>

<script>
const { ref } = require( 'vue' );
const { CdxRadio } = require( '@wikimedia/codex' );

// @vue/component
module.exports = {
	components: {
		CdxRadio
	},
	setup() {
		const options = [
			{ label: 'Apple', value: 'a' },
			{ label: 'Banana', value: 'b' },
			{ label: 'Canteloupe', value: 'c', disabled: true }
		];
		const selection = ref();

		return {
			options,
			selection
		};
	}
};
</script>
