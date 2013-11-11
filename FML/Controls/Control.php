<?php

namespace FML\Controls;

use FML\Types\Renderable;

/**
 * Class representing CMlControl
 *
 * @author steeffeen
 */
abstract class Control implements Renderable {
	/**
	 * Constants
	 */
	const CENTER = 'center';
	const CENTER2 = 'center2';
	const TOP = 'top';
	const RIGHT = 'right';
	const BOTTOM = 'bottom';
	const LEFT = 'left';
	
	/**
	 * Protected properties
	 */
	protected $name = 'control';
	protected $id = '';
	protected $x = 0.;
	protected $y = 0.;
	protected $z = 0.;
	protected $height = 0.;
	protected $width = 0.;
	protected $hAlign = 'center';
	protected $vAlign = 'center2';
	protected $scale = 1.;
	protected $hidden = 0;

	/**
	 * Set it
	 *
	 * @param string $id        	
	 * @return \FML\Controls\Control
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/**
	 * Set position
	 *
	 * @param real $x        	
	 * @param real $y        	
	 * @param real $z        	
	 * @return \FML\Controls\Control
	 */
	public function setPosition($x = null, $y = null, $z = null) {
		if ($x !== null) {
			$this->x = $x;
		}
		if ($y !== null) {
			$this->y = $y;
		}
		if ($z !== null) {
			$this->z = $z;
		}
		return $this;
	}

	/**
	 * Set size
	 *
	 * @param real $height        	
	 * @param real $width        	
	 * @return \FML\Controls\Control
	 */
	public function setSize($height = null, $width = null) {
		if ($height !== null) {
			$this->height = $height;
		}
		if ($width !== null) {
			$this->width = $width;
		}
		return $this;
	}

	/**
	 * Set horizontal alignment
	 *
	 * @param string $hAlign        	
	 * @return \FML\Controls\Control
	 */
	public function setHAlign($hAlign) {
		$this->hAlign = $hAlign;
		return $this;
	}

	/**
	 * Set vertical alignment
	 *
	 * @param string $vAlign        	
	 * @return \FML\Controls\Control
	 */
	public function setVAlign($vAlign) {
		$this->vAlign = $vAlign;
		return $this;
	}

	/**
	 * Set horizontal and vertical alignment
	 *
	 * @param string $halign        	
	 * @param string $vAlign        	
	 * @return \FML\Controls\Control
	 */
	public function setAlign($halign, $vAlign) {
		$this->setHAlign($hAlign);
		$this->setVAlign($vAlign);
		return $this;
	}

	/**
	 * Set scale
	 *
	 * @param real $scale        	
	 * @return \FML\Controls\Control
	 */
	public function setScale($scale) {
		$this->scale = $scale;
		return $this;
	}

	/**
	 * Set visible
	 *
	 * @param bool $visible        	
	 * @return \FML\Controls\Control
	 */
	public function setVisible($visible) {
		$this->hidden = ($visible ? 0 : 1);
		return $this;
	}

	/**
	 *
	 * @see \FML\Types\Renderable::render()
	 */
	public function render(\DOMDocument $domDocument) {
		$xml = $domDocument->createElement($this->name);
		if ($this->id) {
			$xml->setAttribute('id', $this->id);
		}
		if ($this->x || $this->y || $this->z) {
			$xml->setAttribute('posn', "{$this->x} {$this->y} {$this->z}");
		}
		if ($this->width || $this->height) {
			$xml->setAttribute('sizen', "{$this->width} {$this->height}");
		}
		if ($this->hAlign) {
			$xml->setAttribute('halign', $this->hAlign);
		}
		if ($this->vAlign) {
			$xml->setAttribute('valign', $this->vAlign);
		}
		if ($this->scale !== 1.) {
			$xml->setAttribute('scale', $this->scale);
		}
		if ($this->hidden) {
			$xml->setAttribute('hidden', $this->hidden);
		}
		return $xml;
	}
}

?>
