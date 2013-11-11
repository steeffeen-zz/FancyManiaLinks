<?php

namespace FML\Controls;

/**
 * Class representing video (CMlMediaPlayer)
 *
 * @author steeffeen
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
