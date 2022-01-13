<template>
	<div class="mw-language-search">
		<p>
			Selected language code: {{ selectedLanguageCode || '(none)' }}
		</p>
		<cdx-lookup
			v-model="selectedLanguageCode"
			v-model:input-value="search"
			:options="results"
			:placeholder="$i18n( 'vuetest-language-search-placeholder' )"
			:start-icon="cdxIconLanguage"
			clearable
		>
			<template #menu-option="{ option }">
				<span class="mw-language-search-result-name">
					{{ option.name }}
				</span>
				<span class="mw-language-search-result-code">
					{{ option.code }}
				</span>
			</template>
		</cdx-lookup>
	</div>
</template>

<script>
const codex = require( 'codex' ),
	icons = require( './icons.json' ),
	languageNames = mw.language.getData( mw.config.get( 'wgUserLanguage' ), 'languageNames' ),
	languageResults = Object.keys( languageNames ).map( function ( code ) {
		return { code: code, name: languageNames[ code ] };
	} );

// @vue/component
module.exports = {
	components: {
		CdxLookup: codex.CdxLookup
	},
	data: function () {
		return {
			search: '',
			selectedLanguageCode: '',
			cdxIconLanguage: icons.cdxIconLanguage
		};
	},
	computed: {
		results: function () {
			const query = this.search.toLowerCase();
			if ( query === '' ) {
				return [];
			}
			return languageResults
				.filter( function ( result ) {
					return result.code.toLowerCase().slice( 0, query.length ) === query ||
						result.name.toLowerCase().slice( 0, query.length ) === query;
				} )
				.map( function ( result ) {
					return {
						code: result.code,
						name: result.name,
						value: result.code,
						label: result.name
					};
				} );
		}
	}
};
</script>

<style lang="less">
@import 'mediawiki.ui/variables';

.mw-language-search {
	width: 500px;

	&-result-code {
		float: right;
		color: @colorGray7;
	}
}
</style>
