<template>
	<section id="cdx-icon">
		<h2>Icons</h2>
		<p dir="rtl">
			<cdx-icon :icon="cdxIconArrowNext"></cdx-icon> next
		</p>
		<p lang="nl" dir="ltr">
			<cdx-icon :icon="cdxIconBold"></cdx-icon> Bold
		</p>
	</section>
</template>

<script>
const { CdxIcon } = require( '@wikimedia/codex' );
const { cdxIconArrowNext, cdxIconBold } = require( './icons.json' );

// @vue/component
module.exports = {
	components: {
		CdxIcon
	},
	setup() {
		return {
			cdxIconArrowNext,
			cdxIconBold
		};
	}
};
</script>
