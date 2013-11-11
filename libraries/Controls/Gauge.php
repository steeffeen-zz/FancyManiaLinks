<?php

namespace FML;

require_once __DIR__ . '/Control.php';
require_once __DIR__ . '/../Types/Styleable.php';

/**
 * Class representing CMlGauge
 *
 * @author Steff
 */
class Gauge extends Control implements Styleable {
	/**
	 * Protected properties
	 */
	protected $ratio = 1.;
	protected $grading = 1.;
	protected $rotation = 0.;
	protected $centered = 0;
	protected $clan = 0;
	protected $drawBg = 1;
	protected $drawBlockBg = 1;

	/**
	 * Construct gauge control
	 */
	public function __construct() {
		$this->name = 'gauge';
	}

	/**
	 * Set ratio
	 *
	 * @param real $ratio        	
	 */
	public function setRatio($ratio) {
		$this->ratio = $ratio;
	}

	/**
	 * Set grading
	 *
	 * @param real $grading        	
	 */
	public function setGrading($grading) {
		$this->grading = $grading;
	}

	/**
	 * Set rotation
	 *
	 * @param real $rotation        	
	 */
	public function setRotation($rotation) {
		$this->rotation = $rotation;
	}

	/**
	 * Set centered
	 *
	 * @param bool $centered        	
	 */
	public function setCentered($centered) {
		$this->centered = ($centered ? 1 : 0);
	}

	/**
	 * Set clan
	 *
	 * @param int $clan        	
	 */
	public function setClan($clan) {
		$this->clan = $clan;
	}

	/**
	 * Set draw background
	 *
	 * @param bool $drawBg        	
	 */
	public function setDrawBg($drawBg) {
		$this->drawBg = ($drawBg ? 1 : 0);
	}

	/**
	 * Set draw block background
	 *
	 * @param bool $drawBlockBg        	
	 */
	public function setDrawBlockBg($drawBlockBg) {
		$this->drawBlockBg = ($drawBlockBg ? 1 : 0);
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \FML\Control::render()
	 */
	public function render() {
		$xml = parent::render();
		$xml->setAttribute('ratio', $this->ratio);
		$xml->setAttribute('grading', $this->grading);
		$xml->setAttribute('rotation', $this->rotation);
		$xml->setAttribute('centered', $this->centered);
		$xml->setAttribute('clan', $this->clan);
		$xml->setAttribute('drawbg', $this->drawBg);
		$xml->setAttribute('drawblockbg', $this->drawBlockBg);
		return $xml;
	}
}

?>
