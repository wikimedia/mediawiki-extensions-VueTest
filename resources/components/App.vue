<template>
	<div>
		<header>
			<h1>Codex Demo</h1>
		</header>

		<main class="sandbox-main">
			<cdx-tabs v-model:active="activeTab" :framed="true">
				<cdx-tab name="combobox">
					<h2>Combobox</h2>
					<cdx-combobox
						v-model:selected="selection"
						:menu-items="options"
						placeholder="Type or choose an option"
						:disabled="false"
						:clearable="true"
					></cdx-combobox>
					<p>Selected value: {{ selection || '(none)' }}</p>
				</cdx-tab>

				<cdx-tab name="select">
					<h2>Select</h2>
					<cdx-select
						v-model:selected="selection"
						:menu-items="options"
						default-label="Choose an option"
					></cdx-select>
					<p>Selected value: {{ selection || '(none)' }}</p>
				</cdx-tab>

				<cdx-tab name="radio">
					<h2>Radios</h2>
					<cdx-radio
						v-for="option in options"
						:key="option.value"
						v-model="selection"
						:input-value="option.value"
						name="vuetest-radios"
					>
						{{ option.label }}
					</cdx-radio>
					<p>Selected value: {{ selection || '(none)' }}</p>
				</cdx-tab>

				<cdx-tab name="textinput">
					<h2>Text input</h2>
					Selected value: <cdx-text-input v-model="selection" clearable></cdx-text-input>
				</cdx-tab>

				<cdx-tab name="checkbox">
					<h2>Checkboxes</h2>
					<cdx-checkbox
						v-for="option in options"
						:key="option.value"
						v-model="multiSelection"
						:input-value="option.value"
						name="vuetest-checkboxes"
					>
						{{ option.label }}
					</cdx-checkbox>
					<p>Selected values: {{ multiSelection.join( ', ' ) || '(none)' }}</p>
				</cdx-tab>

				<cdx-tab name="icon">
					<h2>Icons</h2>
					<p dir="rtl">
						<cdx-icon :icon="icons.cdxIconArrowNext"></cdx-icon> next
					</p>
					<p lang="nl" dir="ltr">
						<cdx-icon :icon="icons.cdxIconBold"></cdx-icon> Bold
					</p>
				</cdx-tab>

				<cdx-tab name="button">
					<h2>Button</h2>
					<table>
						<thead>
							<tr>
								<th></th>
								<th>Normal</th>
								<th>Primary</th>
								<th>Quiet</th>
								<th>undefined</th>
							</tr>
						</thead>
						<tbody>
							<template v-for="buttonAction in [ 'default', 'progressive', 'destructive', undefined ]">
								<tr
									v-for="disabled in [ true, false ]"
									:key="`action-${buttonAction}-${Number( disabled )}`"
								>
									<th>
										{{ buttonAction || 'undefined' }}
										{{ disabled ? ' disabled' : '' }}
									</th>
									<td
										v-for="buttonType in [ 'normal', 'primary', 'quiet', undefined ]"
										:key="`type-${buttonType}`">
										<cdx-button
											:type="buttonType"
											:action="buttonAction"
											:disabled="disabled"
											@click="onClick">
											<cdx-icon :icon="icons.cdxIconTrash"></cdx-icon>
											Button
										</cdx-button>
									</td>
								</tr>
							</template>
						</tbody>
					</table>
				</cdx-tab>
				<cdx-tab name="toggles">
					<h2>ToggleButton and ToggleSwitch</h2>
					<cdx-toggle-button v-model="toggleValue">
						<cdx-icon :icon="toggleButtonIcon"></cdx-icon>
						{{ toggleButtonLabel }}
					</cdx-toggle-button>

					<p>
						Playing:
						<cdx-toggle-switch v-model="toggleValue"></cdx-toggle-switch>
					</p>
				</cdx-tab>
				<cdx-tab name="message">
					<h2>Message</h2>
					<cdx-message
						v-for="type in [ 'notice', 'warning', 'error', 'success' ]"
						:key="type"
						:type="type"
						dismiss-button-label="Dismiss"
					>
						{{ type }}
					</cdx-message>
				</cdx-tab>
				<cdx-tab
					name="Disabled"
					:disabled="true"
					label="This is a tab with a really really really really really long name"
				>
					<p>Content for disabled tab</p>
				</cdx-tab>
				<cdx-tab name="tabs">
					<h2>Tabs</h2>

					<cdx-tabs v-model:active="activeTabInner">
						<cdx-tab
							v-for="( tab, index ) in dynamicTabs"
							:key="index"
							:name="tab"
						>
							<p>Content for {{ tab }}</p>
						</cdx-tab>
					</cdx-tabs>

					<cdx-button @click="reverseTabs">
						Reverse tab order
					</cdx-button>
				</cdx-tab>
			</cdx-tabs>
		</main>
	</div>
</template>

<script>
// Codex is available from ResourceLoader at runtime
// and is available without needing a build step.
const {
	CdxButton,
	CdxCheckbox,
	CdxCombobox,
	CdxIcon,
	CdxMessage,
	CdxRadio,
	CdxSelect,
	CdxTab,
	CdxTabs,
	CdxTextInput,
	CdxToggleButton,
	CdxToggleSwitch
} = require( '@wikimedia/codex' );

// Codex Icons are also available from ResourceLoader.
// To avoid loading all of them, you will probably want
// to use a RL callback so that only the specified icons
// are delivered; see this project's extension.json file
// for an example.
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
		CdxButton,
		CdxCheckbox,
		CdxCombobox,
		CdxIcon,
		CdxMessage,
		CdxRadio,
		CdxSelect,
		CdxTab,
		CdxTabs,
		CdxTextInput,
		CdxToggleButton,
		CdxToggleSwitch
	},

	data() {
		return {
			activeTab: 'combobox',
			activeTabInner: 'tab1',
			dynamicTabs: [ 'tab1', 'tab2', 'tab3' ],
			selection: '',
			multiSelection: [],
			toggleValue: false,
			options,
			icons
		};
	},

	computed: {
		toggleButtonIcon() {
			return this.toggleValue ? icons.cdxIconPause : icons.cdxIconPlay;
		},
		toggleButtonLabel() {
			return this.toggleValue ? 'Pause' : 'Play';
		}
	},

	methods: {
		onClick( e ) {
			// eslint-disable-next-line no-console
			console.log( e );
		},
		reverseTabs() {
			this.dynamicTabs.reverse();
		}
	}
};

</script>
