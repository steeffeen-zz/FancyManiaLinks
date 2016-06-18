<?php

namespace FML\Controls;

use FML\Types\Playable;
use FML\Types\Scriptable;

/**
 * Audio Control
 * (CMlMediaPlayer)
 *
 * @author    steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Audio extends Control implements Playable, Scriptable
{

    /**
     * @var string $data Data url
     */
    protected $data = null;

    /**
     * @var string $dataId Data id
     */
    protected $dataId = null;

    /**
     * @var bool $play Play automaticcaly
     */
    protected $play = null;

    /**
     * @var bool $looping Looping
     */
    protected $looping = true;

    /**
     * @var bool $music Music type
     */
    protected $music = null;

    /**
     * @var float $volume Volume
     */
    protected $volume = 1.;

    /**
     * @var bool $scriptEvents Script events usage
     */
    protected $scriptEvents = null;

    /**
     * @see Control::getTagName()
     */
    public function getTagName()
    {
        return "audio";
    }

    /**
     * @see Control::getManiaScriptClass()
     */
    public function getManiaScriptClass()
    {
        return "CMlMediaPlayer";
    }

    /**
     * @see Playable::getData()
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @see Playable::setData()
     */
    public function setData($data)
    {
        $this->data = (string)$data;
        return $this;
    }

    /**
     * @see Playable::getDataId()
     */
    public function getDataId()
    {
        return $this->dataId;
    }

    /**
     * @see Playable::setDataId()
     */
    public function setDataId($dataId)
    {
        $this->dataId = (string)$dataId;
        return $this;
    }

    /**
     * @see Playable::getPlay()
     */
    public function getPlay()
    {
        return $this->play;
    }

    /**
     * @see Playable::setPlay()
     */
    public function setPlay($play)
    {
        $this->play = (bool)$play;
        return $this;
    }

    /**
     * @see Playable::getLooping()
     */
    public function getLooping()
    {
        return $this->looping;
    }

    /**
     * @see Playable::setLooping()
     */
    public function setLooping($looping)
    {
        $this->looping = (bool)$looping;
        return $this;
    }

    /**
     * @see Playable::getMusic()
     */
    public function getMusic()
    {
        return $this->music;
    }

    /**
     * @see Playable::setMusic()
     */
    public function setMusic($music)
    {
        $this->music = (bool)$music;
        return $this;
    }

    /**
     * @see Playable::getVolume()
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @see Playable::setVolume()
     */
    public function setVolume($volume)
    {
        $this->volume = (float)$volume;
        return $this;
    }

    /**
     * @see Scriptable::getScriptEvents()
     */
    public function getScriptEvents()
    {
        return $this->scriptEvents;
    }

    /**
     * @see Scriptable::setScriptEvents()
     */
    public function setScriptEvents($scriptEvents)
    {
        $this->scriptEvents = (bool)$scriptEvents;
        return $this;
    }

    /**
     * @see Renderable::render()
     */
    public function render(\DOMDocument $domDocument)
    {
        $domElement = parent::render($domDocument);
        if ($this->data) {
            $domElement->setAttribute("data", $this->data);
        }
        if ($this->dataId) {
            $domElement->setAttribute("dataid", $this->dataId);
        }
        if ($this->play) {
            $domElement->setAttribute("play", 1);
        }
        if (!$this->looping) {
            $domElement->setAttribute("looping", 0);
        }
        if ($this->music) {
            $domElement->setAttribute("music", 1);
        }
        if ($this->volume != 1.) {
            $domElement->setAttribute("volume", $this->volume);
        }
        if ($this->scriptEvents) {
            $domElement->setAttribute("scriptevents", 1);
        }
        return $domElement;
    }

}
