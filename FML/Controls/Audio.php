<?php 

namespace FML\Controls;

/**
 * Class representing audio (CMlMediaPlayer)
 *
 * @author steeffeen
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
