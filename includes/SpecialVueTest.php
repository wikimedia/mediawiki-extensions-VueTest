<?php
/**
 * VueTest Special page.
 *
 * @file
 */

namespace MediaWiki\Extension\VueTest;

use TemplateParser;

class SpecialVueTest extends \SpecialPage {

	/**
	 * @var TemplateParser
	 */
	private $templateParser;

	/**
	 * Initialize the special page.
	 */
	public function __construct() {
		// A special page should at least have a name.
		// We do this by calling the parent class (the SpecialPage class)
		// constructor method with the name as first and only parameter.
		parent::__construct( 'VueTest' );

		$this->templateParser = new TemplateParser( __DIR__ . '/templates' );
	}

	/**
	 * Shows the page to the user.
	 * @param string $sub The subpage string argument (if any).
	 *  [[Special:HelloWorld/subpage]].
	 */
	public function execute( $sub ) {
		$out = $this->getOutput();

		if ( $sub === 'codex' ) {
			$out->setPageTitle( $this->msg( 'vuetest-codex-title' ) );
			$out->addSubtitle( '&lt; ' . $this->getLinkRenderer()->makeLink( $this->getPageTitle() ) );
			$out->addModules( 'ext.vueTest.codexdemo' );
			$out->addHTML( $this->templateParser->processTemplate( 'VueRoot', [] ) );
		} elseif ( $sub === 'codex/css' ) {
			$out->setPageTitle( $this->msg( 'vuetest-codex-css-title' ) );
			$out->addSubtitle( '&lt; ' . $this->getLinkRenderer()->makeLink( $this->getPageTitle() ) );
			// TODO: When Codex styles are available as a module, use those instead.
			$out->addModules( '@wikimedia/codex' );
			$out->addModuleStyles( [ 'ext.vueTest.codexcssdemo' ] );

			$data = [
				'sections' => [
					[ 'name' => 'Button', 'machine-name' => 'button' ],
					[ 'name' => 'Checkbox', 'machine-name' => 'checkbox' ],
					[ 'name' => 'Icon', 'machine-name' => 'icon' ],
					[ 'name' => 'Link', 'machine-name' => 'link' ],
					[ 'name' => 'Message', 'machine-name' => 'message' ],
					[ 'name' => 'Radio', 'machine-name' => 'radio' ],
					[ 'name' => 'SearchInput', 'machine-name' => 'search-input' ],
					[ 'name' => 'Select', 'machine-name' => 'select' ],
					[ 'name' => 'TextInput', 'machine-name' => 'text-input' ],
				]
			];
			$templateHtml = $this->templateParser->processTemplate( 'AllCssComponents', $data );
			$out->addHTML( $templateHtml );
		} else {
			$out->setPageTitle( $this->msg( 'vuetest' ) );
			$out->addSubtitle( $this->msg( 'vuetest-summary' )->escaped() );
			$out->addModules( 'ext.vueTest' );
			$out->addHTML( '<h2>Codex components</h2>' );
			$out->addHTML( $this->msg( 'vuetest-app-see-also' )->parseAsBlock() );
			$out->addHTML( $this->msg( 'vuetest-app-see-also-css' )->parseAsBlock() );
			$out->addHTML( $this->templateParser->processTemplate( 'VueRoot', [] ) );
		}
	}

	// phpcs:ignore
	protected function getGroupName() {
		return 'other';
	}
}
