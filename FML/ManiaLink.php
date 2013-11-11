<?php

namespace FML;

require_once __DIR__ . '/autoload.php';

use FML\Types\Renderable;

/**
 * Class representing a manialink
 *
 * @author steeffeen
 */
class ManiaLink {
	/**
	 * Private properties
	 */
	private $name = 'manialink';
	private $id = '';
	private $version = 1;
	private $background = '';
	private $navigable3d = 0;
	private $timeout = 0;
	private $children = array();
	private $encoding = 'utf-8';

	/**
	 * Set xml encoding
	 *
	 * @param string $encoding        	
	 * @return \FML\ManiaLink
	 */
	public function setXmlEncoding($encoding) {
		$this->encoding = $encoding;
		return $this;
	}

	/**
	 * Set id
	 *
	 * @param string $id        	
	 * @return \FML\ManiaLink
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/**
	 * Set background
	 *
	 * @param string $background        	
	 * @return \FML\ManiaLink
	 */
	public function setBackground($background) {
		$this->background = $background;
		return $this;
	}

	/**
	 * Set navigable3d
	 *
	 * @param bool $navigable3d        	
	 * @return \FML\ManiaLink
	 */
	public function setNavigable3d($navigable3d) {
		$this->navigable3d = ($navigable3d ? 1 : 0);
		return $this;
	}

	/**
	 * Set timeout
	 *
	 * @param int $timeout        	
	 * @return \FML\ManiaLink
	 */
	public function setTimeout($timeout) {
		$this->timeout = $timeout;
		return $this;
	}

	/**
	 * Add a new child
	 *
	 * @param mixed $child        	
	 * @return \FML\ManiaLink
	 */
	public function add(Renderable $child) {
		array_push($this->children, $child);
		return $this;
	}

	/**
	 * Render the xml document
	 *
	 * @return \DOMDocument
	 */
	public function render() {
		$domDocument = new \DOMDocument('1.0', $this->encoding);
		$manialink = $domDocument->createElement($this->name);
		if ($this->id) {
			$manialink->setAttribute('id', $this->id);
		}
		if ($this->version) {
			$manialink->setAttribute('version', $this->version);
		}
		if ($this->background) {
			$manialink->setAttribute('background', $this->background);
		}
		if ($this->navigable3d) {
			$manialink->setAttribute('navigable3d', $this->navigable3d);
		}
		if ($this->timeout) {
			$timeoutXml = $domDocument->createElement('timeout', $this->timeout);
			$manialink->appendChild($timeoutXml);
		}
		foreach ($this->children as $child) {
			$childXml = $child->render($domDocument);
			$manialink->appendChild($childXml);
		}
		$domDocument->appendChild($manialink);
		return $domDocument;
	}
}

?>
