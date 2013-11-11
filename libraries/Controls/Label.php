<?php

namespace FML;

require_once __DIR__ . '/Control.php';
require_once __DIR__ . '/../Types/Linkable.php';
require_once __DIR__ . '/../Types/NewLineable.php';
require_once __DIR__ . '/../Types/Scriptable.php';
require_once __DIR__ . '/../Types/Styleable.php';
require_once __DIR__ . '/../Types/TextFormatable.php';

/**
 * Class representing CMlLabel
 *
 * @author Steff
 */
class Label extends Control implements Linkable, NewLineable, Scriptable, Styleable, TextFormatable {
	/**
	 * Protected properties
	 */
	protected $text = '';
	protected $textPrefix = '';
	protected $textEmboss = 0;
	protected $maxLines = 1;

	/**
	 * Construct label control
	 */
	public function __construct() {
		$this->name = 'label';
	}

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
	public function setTextPrefix($textPrefix) {
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

	/**
	 * (non-PHPdoc)
	 *
	 * @see \FML\Control::render()
	 */
	public function render() {
		$xml = parent::render();
		$xml->setAttribute('text', $this->text);
		$xml->setAttribute('textprefix', $this->textPrefix);
		$xml->setAttribute('textemboss', $this->textEmboss);
		$xml->setAttribute('maxlines', $this->maxLines);
		return $xml;
	}
}

?>
