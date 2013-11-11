<?php

namespace FML;

require_once __DIR__ . '/Control.php';
require_once __DIR__ . '/../Types/BgColorable.php';
require_once __DIR__ . '/../Types/Linkable.php';
require_once __DIR__ . '/../Types/Scriptable.php';
require_once __DIR__ . '/../Types/Styleable.php';
require_once __DIR__ . '/../Types/Substyleable.php';

/**
 * Class representing CMlQuad
 *
 * @author Steff
 */
class Quad extends Control implements BgColorable, Linkable, Scriptable, Styleable, SubStyleable {
	/**
	 * Protected properties
	 */
	protected $image = '';
	protected $imageFocus = '';
	protected $colorize = '';
	protected $modulizeColor = '';

	/**
	 * Construct quad control
	 */
	public function __construct() {
		$this->name = 'quad';
	}

	/**
	 * Set image
	 *
	 * @param string $image        	
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Set focus image
	 *
	 * @param string $imageFocus        	
	 */
	public function setImage($imageFocus) {
		$this->imageFocus = $imageFocus;
	}

	/**
	 * Set colorize
	 *
	 * @param string $colorize        	
	 */
	public function setColorize($colorize) {
		$this->colorize = $colorize;
	}

	/**
	 * Set modulize color
	 *
	 * @param string $modulizeColor        	
	 */
	public function setModulizeColor($modulizeColor) {
		$this->modulizeColor = $modulizeColor;
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \FML\Control::render()
	 */
	public function render() {
		$xml = parent::render();
		$xml->setAttribute('image', $this->image);
		$xml->setAttribute('imagefocus', $this->imageFocus);
		$xml->setAttribute('colorize', $this->colorize);
		$xml->setAttribute('modulizecolor', $this->modulizeColor);
		return $xml;
	}
}

?>
