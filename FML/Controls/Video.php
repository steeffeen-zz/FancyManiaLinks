<?php

namespace FML\Controls;

use FML\Types\Playable;
use FML\Types\Scriptable;

/**
 * Video Control
 * (CMlMediaPlayer)
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Video extends Control implements Playable, Scriptable {

	/*
	 * Protected properties
	 */
	protected $tagName = 'video';
	protected $data = null;
	protected $dataId = null;
	protected $play = null;
	protected $looping = true;
	protected $music = null;
	protected $volume = 1.;
	protected $scriptEvents = null;

	/**
	 * @see Control::getManiaScriptClass()
	 */
	public function getManiaScriptClass() {
		return 'CMlMediaPlayer';
	}

	/**
	 * @see Playable::setData()
	 */
	public function setData($data) {
		$this->data = (string)$data;
		return $this;
	}

	/**
	 * @see Playable::setDataId()
	 */
	public function setDataId($dataId) {
		$this->dataId = (string)$dataId;
		return $this;
	}

	/**
	 * @see Playable::setPlay()
	 */
	public function setPlay($play) {
		$this->play = ($play ? 1 : 0);
		return $this;
	}

	/**
	 * @see Playable::setLooping()
	 */
	public function setLooping($looping) {
		$this->looping = ($looping ? 1 : 0);
		return $this;
	}

	/**
	 * @see Playable::setMusic()
	 */
	public function setMusic($music) {
		$this->music = ($music ? 1 : 0);
		return $this;
	}

	/**
	 * @see Playable::setVolume()
	 */
	public function setVolume($volume) {
		$this->volume = (float)$volume;
		return $this;
	}

	/**
	 * @see Scriptable::setScriptEvents()
	 */
	public function setScriptEvents($scriptEvents) {
		$this->scriptEvents = ($scriptEvents ? 1 : 0);
		return $this;
	}

	/**
	 * @see Renderable::render()
	 */
	public function render(\DOMDocument $domDocument) {
		$domElement = parent::render($domDocument);
		if ($this->data) {
			$domElement->setAttribute('data', $this->data);
		}
		if ($this->play) {
			$domElement->setAttribute('play', $this->play);
		}
		if (!$this->looping) {
			$domElement->setAttribute('looping', $this->looping);
		}
		if ($this->music) {
			$domElement->setAttribute('music', $this->music);
		}
		if ($this->volume != 1.) {
			$domElement->setAttribute('volume', $this->volume);
		}
		if ($this->scriptEvents) {
			$domElement->setAttribute('scriptevents', $this->scriptEvents);
		}
		return $domElement;
	}
	
}
