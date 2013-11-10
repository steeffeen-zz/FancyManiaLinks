<?php

namespace FML;

/**
 * Class representing CMlControl
 *
 * @author Steff
 */
abstract class Control implements Addable {
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
	protected $id = '';
	protected $x = 0.;
	protected $y = 0.;
	protected $z = 0.;
	protected $height = 0.;
	protected $width = 0.;
	protected $hAlign = 'center';
	protected $vAlign = 'center2';
	protected $scale = 1.;
	protected $visible = 1;

	/**
	 * Set it
	 *
	 * @param string $id        	
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * Set position
	 *
	 * @param real $x        	
	 * @param real $y        	
	 * @param real $z        	
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
	}

	/**
	 * Set size
	 *
	 * @param real $height        	
	 * @param real $width        	
	 */
	public function setSize($height = null, $width = null) {
		if ($height !== null) {
			$this->height = $height;
		}
		if ($width !== null) {
			$this->width = $width;
		}
	}

	/**
	 * Set horizontal alignment
	 *
	 * @param string $hAlign        	
	 */
	public function setHAlign($hAlign) {
		$this->hAlign = $hAlign;
	}

	/**
	 * Set vertical alignment
	 *
	 * @param string $vAlign        	
	 */
	public function setVAlign($vAlign) {
		$this->vAlign = $vAlign;
	}

	/**
	 * Set scale
	 *
	 * @param real $scale        	
	 */
	public function setScale($scale) {
		$this->scale = $scale;
	}

	/**
	 * Set visible
	 *
	 * @param bool $visible        	
	 */
	public function setVisible($visible) {
		$this->visible = ($visible ? 1 : 0);
	}
}

?>
