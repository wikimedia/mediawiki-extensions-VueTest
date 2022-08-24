<template>
	<section id="cdx-menu">
		<h2>Menu</h2>
		<div class="cdx-docs-input-with-menu">
			<cdx-text-input
				v-model="selectedValue"
				class="cdx-docs-input-with-menu__input"
				:aria-expanded="expanded"
				@click="onClick"
				@blur="expanded = false"
				@keydown="onKeydown"
			></cdx-text-input>
			<cdx-menu
				ref="menu"
				v-model:selected="selectedValue"
				v-model:expanded="expanded"
				:menu-items="menuItems"
			></cdx-menu>
		</div>
	</section>
</template>

<script>
const { ref } = require( 'vue' );
const { CdxMenu, CdxTextInput } = require( '@wikimedia/codex' );

// @vue/component
module.exports = {
	components: {
		CdxMenu,
		CdxTextInput
	},
	setup() {
		const menu = ref();
		const selectedValue = ref( '' );
		const expanded = ref( false );
		const menuItems = [
			{ label: 'One', value: '1' },
			{ label: 'Two', value: '2', disabled: true },
			{ label: 'Three', value: '3' },
			{ label: 'Four', value: '4' }
		];

		function onKeydown( e ) {
			// Delegate key events to the menu
			menu.value.delegateKeyNavigation( e );
		}

		function onClick() {
			expanded.value = true;
		}

		return {
			menu,
			selectedValue,
			expanded,
			menuItems,
			onKeydown,
			onClick
		};
	}
};
</script>
