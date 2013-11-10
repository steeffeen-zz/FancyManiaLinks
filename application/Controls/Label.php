<?php

namespace FML;

/**
 * Class representing CMlLabel
 *
 * @author Steff
 */
class Label extends Control implements Styleable, TextFormatable, NewLineable, Linkable, Scriptable {
	/**
	 * Protected properties
	 */
	protected $text = '';
	protected $textPrefix = '';
	protected $textEmboss = 0;
	protected $maxLines = 1;

	/**
	 * Set text
	 *
	 * @param string $text        	
	 */
	public function setText($text) {
		$this->text = $text;
	}

	/**
	 * Set text prefix
	 *
	 * @param string $textPrefix        	
	 */
	public function setText($textPrefix) {
		$this->textPrefix = $textPrefix;
	}

	/**
	 * Set text emboss
	 *
	 * @param bool $textEmboss        	
	 */
	public function setTextEmboss($textEmboss) {
		$this->textEmboss = ($textEmboss ? 1 : 0);
	}

	/**
	 * Set max lines
	 * 
	 * @param int $maxLines        	
	 */
	public function setMaxLines($maxLines) {
		$this->maxLines = $maxLines;
	}
}

?>
