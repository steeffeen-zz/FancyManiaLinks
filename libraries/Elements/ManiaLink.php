<?php

namespace FML;

require_once __DIR__ . '/../Types/Renderable.php';

/**
 * Class representing a manialink
 *
 * @author Steff
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

	/**
	 * Set id
	 *
	 * @param string $id        	
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * Set background
	 *
	 * @param string $background        	
	 */
	public function setBackground($background) {
		$this->background = $background;
	}

	/**
	 * Set navigable3d
	 *
	 * @param bool $navigable3d        	
	 */
	public function setNavigable3d($navigable3d) {
		$this->navigable3d = ($navigable3d ? 1 : 0);
	}

	/**
	 * Set timeout
	 *
	 * @param int $timeout        	
	 */
	public function setTimeout($timeout) {
		$this->timeout = $timeout;
	}

	/**
	 * Add a new child
	 *
	 * @param mixed $child        	
	 */
	public function add(Renderable $child) {
		array_push($this->children, $child);
	}

	/**
	 * Render the xml document
	 *
	 * @return \DOMDocument
	 */
	public function render() {
		$xml = new \DOMDocument();
		$manialink = new \DOMElement($this->name);
		foreach ($this->children as $child) {
			$childXml = $child->render();
			$manialink->appendChild($childXml);
		}
		$xml->appendChild($manialink);
		return $xml;
	}
}

?>
