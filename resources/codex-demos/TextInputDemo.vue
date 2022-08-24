<template>
	<section id="cdx-text-input">
		<h2>Text Inputs</h2>
		<cdx-text-input v-model="inputValue" clearable></cdx-text-input>
		<p>
			Input value: {{ inputValue }}
		</p>
	</section>
</template>

<script>
const { ref } = require( 'vue' );
const { CdxTextInput } = require( '@wikimedia/codex' );

// @vue/component
module.exports = {
	components: {
		CdxTextInput
	},
	setup() {
		const inputValue = ref( '' );

		return {
			inputValue
		};
	}
};
</script>
