<?php

namespace FML\Controls\Quads;

use FML\Controls\Quad;

/**
 * Quad class for 'Emblems' styles
 *
 * @author    steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Quad_Emblems extends Quad {
	/*
	 * Constants
	 */
	const STYLE      = 'Emblems';
	const SUBSTYLE_0 = '#0';
	const SUBSTYLE_1 = '#1';
	const SUBSTYLE_2 = '#2';

	/**
	 * Construct a new Quad_Emblems Control
	 *
	 * @param string $id (optional) Quad id
	 */
	public function __construct($id = null) {
		parent::__construct($id);
		$this->setStyle(self::STYLE);
	}
}
