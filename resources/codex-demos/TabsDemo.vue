<template>
	<section id="cdx-tabs">
		<h2>Tabs</h2>

		<cdx-tabs v-model:active="activeTab">
			<cdx-tab
				v-for="( tab, index ) in tabs"
				:key="index"
				:name="tab"
			>
				<p>Content for {{ tab }}</p>
			</cdx-tab>
		</cdx-tabs>

		<cdx-button @click="reverseTabs">
			Reverse tab order
		</cdx-button>
	</section>
</template>

<script>
const { ref } = require( 'vue' );
const { CdxButton, CdxTab, CdxTabs } = require( '@wikimedia/codex' );

// @vue/component
module.exports = {
	components: {
		CdxButton,
		CdxTab,
		CdxTabs
	},
	setup() {
		const activeTab = ref( 'tab1' );
		const tabs = ref( [ 'tab1', 'tab2', 'tab3' ] );

		function reverseTabs() {
			tabs.value.reverse();
		}

		return {
			activeTab,
			tabs,
			reverseTabs
		};
	}
};
</script>
