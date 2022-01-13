<template>
	<!--
		This component demonstrates one of Vue's core features, two-way data
		binding for form inputs. More info about this feature can be found at:
		https://vuejs.org/v2/guide/forms.html
	-->
	<div id="two-way-binding-module">
		<h2>
			{{ $i18n( 'vuetest-two-way-binding-title' ) }}
		</h2>

		<p v-i18n-html:vuetest-two-way-binding-intro></p>

		<pre>{{ input }}</pre>

		<cdx-text-input v-model="input" clearable></cdx-text-input>
	</div>
</template>

<script>
var codex = require( 'codex' );

module.exports = {
	name: 'TwoWayBindingModule',
	components: {
		CdxTextInput: codex.CdxTextInput
	},

	data: function () {
		return {
			input: 'test test'
		};
	}

};
</script>
