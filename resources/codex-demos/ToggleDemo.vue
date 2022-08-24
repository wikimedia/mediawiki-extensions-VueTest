<template>
	<section id="cdx-toggle">
		<h2>ToggleButton and ToggleSwitch</h2>
		<cdx-toggle-button v-model="toggleValue">
			<cdx-icon :icon="toggleButtonIcon"></cdx-icon>
			{{ toggleButtonLabel }}
		</cdx-toggle-button>

		<p>
			Playing:
			<cdx-toggle-switch v-model="toggleValue"></cdx-toggle-switch>
		</p>
	</section>
</template>

<script>
const { ref, computed } = require( 'vue' );
const { CdxToggleButton, CdxToggleSwitch, CdxIcon } = require( '@wikimedia/codex' );
const { cdxIconPause, cdxIconPlay } = require( './icons.json' );

// @vue/component
module.exports = {
	components: {
		CdxToggleButton,
		CdxToggleSwitch,
		CdxIcon
	},
	setup() {
		const toggleValue = ref( false );
		const toggleButtonIcon = computed( () => toggleValue.value ? cdxIconPause : cdxIconPlay );
		const toggleButtonLabel = computed( () => toggleValue.value ? 'Pause' : 'Play' );

		return {
			toggleValue,
			toggleButtonIcon,
			toggleButtonLabel
		};
	}
};
</script>
