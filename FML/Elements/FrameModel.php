<?php

namespace FML\Elements;

use FML\Types\Renderable;
use FML\Controls\Control;

/**
 * Class representing a Frame Model
 *
 * @author steeffeen
 */
class FrameModel implements Renderable {
	/**
	 * Protected Properties
	 */
	protected $tagName = 'framemodel';
	protected $id = '';
	protected $children = array();

	/**
	 * Set Model Id
	 *
	 * @param string $id Model Id
	 * @return \FML\Elements\FrameModel
	 */
	public function setId($id) {
		$this->id = (string) $id;
		return $this;
	}

	/**
	 * Get Model Id
	 *
	 * @return string
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Assign an Id if necessary
	 *
	 * @return string
	 */
	public function checkId() {
		if (!$this->id) {
			$this->id = uniqid();
		}
		return $this;
	}

	/**
	 * Add a Control to the Model
	 *
	 * @param Control $childControl New Child Control to add
	 * @return \FML\Elements\FrameModel
	 */
	public function addChild(Control $childControl) {
		if (!in_array($childControl, $this->children, true)) {
			array_push($this->children, $childControl);
		}
		return $this;
	}

	/**
	 * Remove all Controls from the Model
	 *
	 * @return \FML\Elements\FrameModel
	 */
	public function removeChildren() {
		$this->children = array();
		return $this;
	}

	/**
	 *
	 * @see \FML\Types\Renderable::render()
	 */
	public function render(\DOMDocument $domDocument) {
		$xmlElement = $domDocument->createElement($this->tagName);
		$this->checkId();
		$xmlElement->setAttribute('id', $this->getId());
		foreach ($this->children as $child) {
			$childElement = $child->render($domDocument);
			$xmlElement->appendChild($childElement);
		}
		return $xmlElement;
	}
}
