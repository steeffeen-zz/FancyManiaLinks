<?php

namespace FML;

require_once __DIR__ . '/Control.php';
require_once __DIR__ . '/../Types/Playable.php';
require_once __DIR__ . '/../Types/Scriptable.php';

/**
 * Class representing audio (CMlMediaPlayer)
 *
 * @author Steff
 */
class Audio extends Control implements Playable, Scriptable {

	/**
	 * Construct audio control
	 */
	public function __construct() {
		$this->name = 'audio';
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \FML\Control::render()
	 */
	public function render() {
		$xml = parent::render();
		return $xml;
	}
}

?>
