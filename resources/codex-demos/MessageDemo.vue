<template>
	<section id="cdx-message">
		<h2>Message</h2>
		<cdx-message
			v-for="( type ) in MessageTypes"
			:key="type"
			:type="type"
			dismiss-button-label="Dismiss"
		>
			{{ type }}
		</cdx-message>
	</section>
</template>

<script>
const { CdxMessage } = require( '@wikimedia/codex' );

// TODO Codex should export this
const MessageTypes = [ 'notice', 'warning', 'error', 'success' ];

// @vue/component
module.exports = {
	components: {
		CdxMessage
	},
	setup() {
		return {
			MessageTypes
		};
	}
};
</script>
