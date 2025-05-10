<?php
/**
 * VueTest Special page.
 *
 * @file
 */

namespace MediaWiki\Extension\VueTest;

use MediaWiki\Html\TemplateParser;
use MediaWiki\SpecialPage\SpecialPage;

class SpecialVueTest extends SpecialPage {

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
		$out->setPageTitleMsg( $this->msg( 'vuetest' ) );
		$out->addSubtitle( $this->msg( 'vuetest-summary' )->escaped() );
		$out->addModules( 'ext.vueTest' );
		$out->addHTML( $this->templateParser->processTemplate( 'VueRoot', [] ) );
	}

	/** @inheritDoc */
	protected function getGroupName() {
		return 'other';
	}
}
