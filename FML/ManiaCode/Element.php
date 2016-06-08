<?php

namespace FML\ManiaCode;

/**
 * Base ManiaCode Element
 *
 * @author    steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
abstract class Element {

	/**
	 * Render the ManiaCode Element
	 *
	 * @param \DOMDocument $domDocument The DOMDocument for which the Element should be rendered
	 * @return \DOMElement
	 */
	public abstract function render(\DOMDocument $domDocument);

	/**
	 * Get the string representation
	 *
	 * @return string
	 */
	public function __toString() {
		$domDocument                = new \DOMDocument("1.0", "utf-8");
		$domDocument->xmlStandalone = true;

		$domElement = $this->render($domDocument);
		$domDocument->appendChild($domElement);

		return $domDocument->saveXML();
	}

}
