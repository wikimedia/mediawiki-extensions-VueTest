<template>
	<section id="cdx-button">
		<h2>
			Button
		</h2>

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
				<template v-for="buttonAction in [ ...ButtonActions, undefined ]">
					<tr
						v-for="disabled in [ true, false ]"
						:key="`action-${buttonAction}-${Number( disabled )}`"
					>
						<th>
							{{ buttonAction || 'undefined' }}
							{{ disabled ? ' disabled' : '' }}
						</th>
						<td
							v-for="buttonType in [ ...ButtonTypes, undefined ]"
							:key="`type-${buttonType}`">
							<cdx-button
								:type="buttonType"
								:action="buttonAction"
								:disabled="disabled"
								@click="onClick">
								<cdx-icon :icon="cdxIconTrash"></cdx-icon>
								Button
							</cdx-button>
						</td>
					</tr>
				</template>
			</tbody>
		</table>
	</section>
</template>

<script>
const { CdxButton, CdxIcon } = require( '@wikimedia/codex' );
const { cdxIconTrash } = require( './icons.json' );

// TODO these should be exported by Codex
const ButtonActions = [ 'default', 'progressive', 'destructive' ];
const ButtonTypes = [ 'normal', 'primary', 'quiet' ];

// @vue/component
module.exports = {
	components: {
		CdxButton,
		CdxIcon
	},
	setup() {
		function onClick( event ) {
			// eslint-disable-next-line no-console
			console.log( 'click', event );
		}

		return {
			cdxIconTrash,
			ButtonActions,
			ButtonTypes,
			onClick
		};
	}
};
</script>
