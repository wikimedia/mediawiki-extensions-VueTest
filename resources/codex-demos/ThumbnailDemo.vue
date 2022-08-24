<template>
	<section id="cdx-thumbnail">
		<h2>Thumbnail</h2>
		<cdx-thumbnail :thumbnail="thumbnailData"></cdx-thumbnail>
	</section>
</template>

<script>
const { CdxThumbnail } = require( '@wikimedia/codex' );

// @vue/component
module.exports = {
	components: {
		CdxThumbnail
	},
	setup() {
		const thumbnailData = {
			width: 200,
			height: 150,
			url: '//upload.wikimedia.org/wikipedia/commons/thumb/2/21/64_365_Color_Macro_%285498808099%29.jpg/200px-64_365_Color_Macro_%285498808099%29.jpg'
		};

		return {
			thumbnailData
		};
	}
};
</script>
