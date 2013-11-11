<?php

namespace FML\Controls\Quads;

use FML\Controls\Quad;

/**
 * Quad class for style 'ManiaPlanetLogos'
 *
 * @author steeffeen
 */
class Quad_ManiaPlanetLogos extends Quad {
	/**
	 * Constants
	 */
	const STYLE = 'ManiaPlanetLogos';

	/**
	 * Construct ManiaPlanetLogos quad
	 */
	public function __construct() {
		parent::__construct();
		$this->setStyle(self::STYLE);
		array("IconPlanets", "IconPlanetsPerspective", "IconPlanetsSmall", "ManiaPlanetLogoBlack", "ManiaPlanetLogoBlackSmall", 
			"ManiaPlanetLogoWhite", "ManiaPlanetLogoWhiteSmall");
	}
}

?>
