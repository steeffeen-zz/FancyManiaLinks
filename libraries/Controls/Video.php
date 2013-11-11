<?php

namespace FML;

require_once __DIR__ . '/Control.php';
require_once __DIR__ . '/../Types/Playable.php';
require_once __DIR__ . '/../Types/Scriptable.php';

/**
 * Class representing video (CMlMediaPlayer)
 *
 * @author Steff
 */
class Video extends Control implements Playable, Scriptable {

	/**
	 * Construct video control
	 */
	public function __construct() {
		$this->name = 'video';
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
