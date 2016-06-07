<?php

namespace FML\Elements;

use FML\Types\Container;
use FML\Types\Renderable;
use FML\UniqueID;

/**
 * Class representing a Frame Model
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class FrameModel implements Container, Renderable {

	/*
	 * Protected properties
	 */
	protected $tagName = 'framemodel';
	protected $modelId = null;
	/** @var Renderable[] $children */
	protected $children = array();
	/** @var Format $format */
	protected $format = null;

	/**
	 * Set the Model id
	 *
	 * @api
	 * @param string $modelId Model id
	 * @return static
	 */
	public function setId($modelId) {
		$this->modelId = (string)$modelId;
		return $this;
	}

	/**
	 * Get the Model id
	 *
	 * @api
	 * @return string
	 */
	public function getId() {
		return $this->modelId;
	}

	/**
	 * Assign an id if necessary
	 *
	 * @return string
	 */
	public function checkId() {
		if (!$this->modelId) {
			$this->setId(UniqueID::create());
		}
		return $this;
	}

	/**
	 * @see Container::add()
	 */
	public function add(Renderable $childElement) {
		if (!in_array($childElement, $this->children, true)) {
			array_push($this->children, $childElement);
		}
		return $this;
	}

	/**
	 * @see Container::removeChildren()
	 */
	public function removeChildren() {
		$this->children = array();
		return $this;
	}

	/**
	 * @see Container::setFormat()
	 */
	public function setFormat(Format $format) {
		$this->format = $format;
		return $this;
	}

	/**
	 * @see Container::getFormat()
	 */
	public function getFormat($createIfEmpty = true) {
		if (!$this->format && $createIfEmpty) {
			$this->setFormat(new Format());
		}
		return $this->format;
	}

	/**
	 * @see Renderable::render()
	 */
	public function render(\DOMDocument $domDocument) {
		$this->checkId();
		$domElement = $domDocument->createElement($this->tagName);
		$domElement->setAttribute('id', $this->getId());
		if ($this->format) {
			$formatXml = $this->format->render($domDocument);
			$domElement->appendChild($formatXml);
		}
		foreach ($this->children as $child) {
			$childElement = $child->render($domDocument);
			$domElement->appendChild($childElement);
		}
		return $domElement;
	}
	
}
