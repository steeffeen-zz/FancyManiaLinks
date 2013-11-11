<?php

namespace FML\Controls\Quads;

use FML\Controls\Quad;

/**
 * Quad class for style 'ManiaplanetSystem'
 *
 * @author steeffeen
 */
class Quad_ManiaplanetSystem extends Quad {
	/**
	 * Constants
	 */
	const STYLE = 'ManiaplanetSystem';

	/**
	 * Construct ManiaplanetSystem quad
	 */
	public function __construct() {
		parent::__construct();
		$this->setStyle(self::STYLE);
		array("BgDialog", "BgDialogAnchor", "BgFloat", "Events", "Medals", "Statistics");
	}
}

?>
