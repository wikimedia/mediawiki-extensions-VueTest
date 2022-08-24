<template>
	<section id="cdx-toggle-button-group">
		<h2>ToggleButtonGroup</h2>
		<cdx-toggle-button-group
			v-model="selectedValue"
			:buttons="buttons"
		></cdx-toggle-button-group>
		<p>
			Selected value:
			{{ selectedValue !== null ? selectedValue : '(null)' }}
		</p>
	</section>
</template>

<script>
const { ref } = require( 'vue' );
const { CdxToggleButtonGroup } = require( '@wikimedia/codex' );

// @vue/component
module.exports = {
	components: {
		CdxToggleButtonGroup
	},
	setup() {
		const buttons = [
			{ value: 1, label: 'One' },
			{ value: 2, label: 'Two' },
			{ value: 3, label: 'Three' },
			{ value: 4, label: 'Four' },
			{ value: 5, label: 'Five' }
		];

		// Initializing to null indicates that this is a single-select group
		const selectedValue = ref( null );

		return {
			buttons,
			selectedValue
		};
	}
};
</script>
