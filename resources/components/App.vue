<template>
	<div>
		<header>
			<h1>Codex Demo</h1>
		</header>

		<main class="sandbox-main">
			<!-- CdxSelect  -->
			<h2>Select</h2>
			<cdx-select
				v-model="selection"
				:options="options"
				default-label="Choose an option"
			></cdx-select>
			<p>Selected value: {{ selection || '(none)' }}</p>

			<!-- CdxRadio -->
			<h2>Radios</h2>
			<cdx-radio
				v-for="option in options"
				:key="option.value"
				v-model="selection"
				:input-value="option.value"
			>
				{{ option.label }}
			</cdx-radio>
			<p>Selected value: {{ selection || '(none)' }}</p>

			<!-- CdxTextInput -->
			<h2>Text input</h2>
			<p>
				Selected value:
				<cdx-text-input v-model="selection" clearable></cdx-text-input>
			</p>

			<!-- CdxCheckbox -->
			<h2>Checkboxes</h2>
			<cdx-checkbox
				v-for="option in options"
				:key="option.value"
				v-model="multiSelection"
				:input-value="option.value"
			>
				{{ option.label }}
			</cdx-checkbox>
			<p>Selected values: {{ multiSelection.join( ', ' ) || '(none)' }}</p>

			<!-- CdxIcon -->
			<h2>Icons</h2>
			<p dir="rtl">
				<cdx-icon :icon="icons.cdxIconArrowNext"></cdx-icon> next
			</p>
			<p lang="nl" dir="ltr">
				<cdx-icon :icon="icons.cdxIconBold"></cdx-icon> Bold
			</p>

			<!-- CdxButton -->
			<h2>Button Variants</h2>
			<h3>Normal</h3>
			<p>
				<cdx-button>
					Default Button
				</cdx-button>
			</p>

			<p>
				<cdx-button action="progressive">
					Progressive Button
				</cdx-button>
			</p>

			<p>
				<cdx-button action="destructive">
					Destructive Button
				</cdx-button>
			</p>

			<p>
				<cdx-button disabled>
					Disabled Button
				</cdx-button>
			</p>

			<h3>Primary</h3>
			<p>
				<cdx-button type="primary">
					Primary Default Button
				</cdx-button>
			</p>

			<p>
				<cdx-button type="primary" action="progressive">
					Primary Progressive Button
				</cdx-button>
			</p>

			<p>
				<cdx-button type="primary" action="destructive">
					Primary Destructive Button
				</cdx-button>
			</p>

			<p>
				<cdx-button type="primary" disabled>
					Primary Disabled Button
				</cdx-button>
			</p>

			<h3>Quiet</h3>
			<p>
				<cdx-button type="quiet">
					Quiet Default Button
				</cdx-button>
			</p>

			<p>
				<cdx-button type="quiet" action="progressive">
					Quiet Progressive Button
				</cdx-button>
			</p>

			<p>
				<cdx-button type="quiet" action="destructive">
					Quiet Destructive Button
				</cdx-button>
			</p>

			<p>
				<cdx-button type="quiet" disabled>
					Quiet Disabled Button
				</cdx-button>
			</p>
		</main>
	</div>
</template>

<script>
const Codex = require( 'codex' );
const icons = require( './icons.json' );

const options = [
	{ label: 'Apple', value: 'a' },
	{ label: 'Banana', value: 'b' },
	{ label: 'Canteloupe', value: 'c' }
];

// @vue/component
module.exports = exports = {
	name: 'App',
	components: {
		CdxButton: Codex.CdxButton,
		CdxCheckbox: Codex.CdxCheckbox,
		CdxIcon: Codex.CdxIcon,
		CdxRadio: Codex.CdxRadio,
		CdxSelect: Codex.CdxSelect,
		CdxTextInput: Codex.CdxTextInput
	},

	data() {
		return {
			selection: '',
			multiSelection: [],
			options,
			icons
		};
	}
};

</script>

<style>
.sandbox-main {
	max-width: 500px;
}
</style>
