<?php

namespace FML\Controls;

use FML\Types\BgColorable;
use FML\Types\Linkable;
use FML\Types\Scriptable;
use FML\Types\Styleable;
use FML\Types\SubStyleable;

/**
 * Class representing CMlQuad
 *
 * @author steeffeen
 */
class Quad extends Control implements BgColorable, Linkable, Scriptable, Styleable, SubStyleable {
	/**
	 * Protected properties
	 */
	protected $image = '';
	protected $imageFocus = '';
	protected $colorize = '';
	protected $modulizeColor = '';
	protected $bgColor = '';
	protected $url = '';
	protected $manialink = '';
	protected $style = '';

	/**
	 * Construct a new quad control
	 *
	 * @param string $id        	
	 */
	public function __construct($id = null) {
		parent::__construct($id);
		$this->tagName = 'quad';
	}

	/**
	 * Set image
	 *
	 * @param string $image        	
	 * @return \FML\Controls\Quad
	 */
	public function setImage($image) {
		$this->image = $image;
		return $this;
	}

	/**
	 * Set focus image
	 *
	 * @param string $imageFocus        	
	 * @return \FML\Controls\Quad
	 */
	public function setImageFocus($imageFocus) {
		$this->imageFocus = $imageFocus;
		return $this;
	}

	/**
	 * Set colorize
	 *
	 * @param string $colorize        	
	 * @return \FML\Controls\Quad
	 */
	public function setColorize($colorize) {
		$this->colorize = $colorize;
		return $this;
	}

	/**
	 * Set modulize color
	 *
	 * @param string $modulizeColor        	
	 * @return \FML\Controls\Quad
	 */
	public function setModulizeColor($modulizeColor) {
		$this->modulizeColor = $modulizeColor;
		return $this;
	}

	/**
	 *
	 * @see \FML\Types\BgColorable::setBgColor()
	 * @return \FML\Controls\Quad
	 */
	public function setBgColor($bgColor) {
		$this->bgColor = $bgColor;
		return $this;
	}

	/**
	 *
	 * @see \FML\Types\Linkable::setUrl()
	 * @return \FML\Controls\Quad
	 */
	public function setUrl($url) {
		$this->url = $url;
		return $this;
	}

	/**
	 *
	 * @see \FML\Types\Linkable::setManialink()
	 * @return \FML\Controls\Quad
	 */
	public function setManialink($manialink) {
		$this->manialink = $manialink;
		return $this;
	}

	/**
	 *
	 * @see \FML\Types\Styleable::setStyle()
	 * @return \FML\Controls\Quad
	 */
	public function setStyle($style) {
		$this->style = $style;
		return $this;
	}

	/**
	 *
	 * @see \FML\Control::render()
	 */
	public function render(\DOMDocument $domDocument) {
		$xml = parent::render($domDocument);
		$xml->setAttribute('image', $this->image);
		$xml->setAttribute('imagefocus', $this->imageFocus);
		$xml->setAttribute('colorize', $this->colorize);
		$xml->setAttribute('modulizecolor', $this->modulizeColor);
		return $xml;
	}
}

?>
