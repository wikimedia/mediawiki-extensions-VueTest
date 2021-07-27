<template>
	<!--
		Example of communication between parent and child components.
	-->
	<div id="parent-child-communication-module">
		<h2>
			{{ $i18n( 'vuetest-parent-child-communication-title' ) }}
		</h2>

		<p>
			{{ $i18n( 'vuetest-parent-child-communication-intro' ) }}
		</p>

		<pre>Click count: {{ clickCount }}</pre>

		<child-component message="Hard-coded props" @update-count="updateCount"></child-component>
		<child-component :message="dynamicProp" @update-count="updateCount"></child-component>

		<input v-model="dynamicProp" type="text">
	</div>
</template>

<script>
var ChildComponent = require( './ChildComponent.vue' );

module.exports = {
	name: 'ParentChildCommunicationModule',
	data: function () {
		return {
			clickCount: 0,
			dynamicProp: 'This prop is dynamic. Type in a new message to see it update.'
		};
	},

	components: {
		'child-component': ChildComponent
	},

	methods: {
		updateCount: function () {
			this.clickCount++;
		}
	}
};
</script>
