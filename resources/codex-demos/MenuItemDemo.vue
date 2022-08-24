<template>
	<section id="cdx-menu-item">
		<h2>Menu Item</h2>
		<cdx-menu-item
			v-bind="menuItem"
		></cdx-menu-item>
	</section>
</template>

<script>
const { CdxMenuItem } = require( '@wikimedia/codex' );

// @vue/component
module.exports = {
	components: {
		CdxMenuItem
	},
	setup() {
		const menuItem = {
			value: 5921,
			label: 'Color',
			id: 'menu-item-default'
		};

		return {
			menuItem
		};
	}
};
</script>
