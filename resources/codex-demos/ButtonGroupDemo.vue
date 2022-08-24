<template>
	<section id="cdx-button-group">
		<h2>
			ButtonGroup
		</h2>
		<cdx-button-group
			:buttons="buttons"
			@click="onClick"
		></cdx-button-group>
	</section>
</template>

<script>
const { CdxButtonGroup } = require( '@wikimedia/codex' );

// @vue/component
module.exports = {
	components: {
		CdxButtonGroup
	},
	setup() {
		const buttons = [
			{ value: 1, label: 'One' },
			{ value: 2, label: 'Two' },
			{ value: 3, label: 'Three' },
			{ value: 4, label: 'Four' },
			{ value: 5, label: 'Five' }
		];

		function onClick( value ) {
			// eslint-disable-next-line no-console
			console.log( 'click', value );
		}

		return {
			buttons,
			onClick
		};

	}
};
</script>
