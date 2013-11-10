<?php

namespace FML;

/**
 * Class representing CMlQuad
 *
 * @author Steff
 */
class Quad extends Control implements Styleable, SubStyleable, BgColorable, Linkable, Scriptable {
	/**
	 * Protected properties
	 */
	protected $image = '';
	protected $imageFocus = '';
	protected $colorize = '';
	protected $modulizeColor = '';

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
}

?>
