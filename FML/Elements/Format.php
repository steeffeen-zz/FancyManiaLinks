<?php

namespace FML\Elements;

use FML\Types\BgColorable;
use FML\Types\Renderable;
use FML\Types\Styleable;
use FML\Types\TextFormatable;

/**
 * Format Element
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Format implements BgColorable, Renderable, Styleable, TextFormatable {

	/*
	 * Protected properties
	 */
	protected $tagName = 'format';
	protected $bgColor = null;
	protected $style = null;
	protected $textSize = -1;
	protected $textFont = null;
	protected $textColor = null;
	protected $focusAreaColor1 = null;
	protected $focusAreaColor2 = null;

	/**
	 * Create a new Format
	 *
	 * @api
	 * @return static
	 */
	public static function create() {
		return new static();
	}

	/**
	 * @see BgColorable::setBgColor()
	 */
	public function setBgColor($bgColor) {
		$this->bgColor = (string)$bgColor;
		return $this;
	}

	/**
	 * @see Styleable::setStyle()
	 */
	public function setStyle($style) {
		$this->style = (string)$style;
		return $this;
	}

	/**
	 * @see TextFormatable::setTextSize()
	 */
	public function setTextSize($textSize) {
		$this->textSize = (int)$textSize;
		return $this;
	}

	/**
	 * @see TextFormatable::setTextFont()
	 */
	public function setTextFont($textFont) {
		$this->textFont = (string)$textFont;
		return $this;
	}

	/**
	 * @see TextFormatable::setTextColor()
	 */
	public function setTextColor($textColor) {
		$this->textColor = (string)$textColor;
		return $this;
	}

	/**
	 * @see TextFormatable::setAreaColor()
	 */
	public function setAreaColor($areaColor) {
		$this->focusAreaColor1 = (string)$areaColor;
		return $this;
	}

	/**
	 * @see TextFormatable::setAreaFocusColor()
	 */
	public function setAreaFocusColor($areaFocusColor) {
		$this->focusAreaColor2 = (string)$areaFocusColor;
		return $this;
	}

	/**
	 * @see Renderable::render()
	 */
	public function render(\DOMDocument $domDocument) {
		$domElement = $domDocument->createElement($this->tagName);
		if ($this->bgColor) {
			$domElement->setAttribute('bgcolor', $this->bgColor);
		}
		if ($this->style) {
			$domElement->setAttribute('style', $this->style);
		}
		if ($this->textSize >= 0) {
			$domElement->setAttribute('textsize', $this->textSize);
		}
		if ($this->textFont) {
			$domElement->setAttribute('textfont', $this->textFont);
		}
		if ($this->textColor) {
			$domElement->setAttribute('textcolor', $this->textColor);
		}
		if ($this->focusAreaColor1) {
			$domElement->setAttribute('focusareacolor1', $this->focusAreaColor1);
		}
		if ($this->focusAreaColor2) {
			$domElement->setAttribute('focusareacolor2', $this->focusAreaColor2);
		}
		return $domElement;
	}
	
}
