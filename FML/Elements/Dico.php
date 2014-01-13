<?php

namespace FML\Elements;

/**
 * Dictionary Element
 *
 * @author steeffeen
 */
class Dico {
	/**
	 * Protected Properties
	 */
	protected $tagName = 'dico';
	
	// TODO: dico methods

	/**
	 * Render the Dico XML Element
	 *
	 * @param \DOMDocument $domDocument DomDocument for which the Dico XML Element should be rendered
	 * @return \DOMElement
	 */
	public function render(\DOMDocument $domDocument) {
		$xmlElement = $domDocument->createElement($this->tagName);
		return $xmlElement;
	}
}
