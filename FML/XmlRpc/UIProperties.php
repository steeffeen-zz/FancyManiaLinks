<?php

namespace FML\XmlRpc;

/**
 * Class representing common UI Properties
 *
 * @author    steeffeen
 * @copyright FancyManiaLinks Copyright © 2017 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
abstract class UIProperties
{

    /**
     * @var array $chatProperties Chat properties
     */
    protected $chatProperties = array();

    /**
     * @var array $chatAvatarProperties Chat avatar properties
     */
    protected $chatAvatarProperties = array();

    /**
     * @var array $mapInfoProperties Map info properties
     */
    protected $mapInfoProperties = array();

    /**
     * @var array $countdownProperties Countdown properties
     */
    protected $countdownProperties = array();

    /**
     * @var array $goProperties Go! properties
     */
    protected $goProperties = array();

    /**
     * Create new UI Properties
     *
     * @api
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * Get the chat visibility
     *
     * @api
     * @return bool
     */
    public function getChatVisible()
    {
        return $this->getProperty($this->chatProperties, "visible");
    }

    /**
     * Set the chat visibility
     *
     * @api
     * @param bool $visible If the chat should be visible
     * @return static
     */
    public function setChatVisible($visible)
    {
        $this->chatProperties["visible"] = (bool)$visible;
        return $this;
    }

    /**
     * Get the chat avatar visibility
     *
     * @api
     * @return bool
     */
    public function getChatAvatarVisible()
    {
        return $this->getProperty($this->chatAvatarProperties, "visible");
    }

    /**
     * Set the chat avatar visibility
     *
     * @api
     * @param bool $visible If the chat avatar should be visible
     * @return static
     */
    public function setChatAvatarVisible($visible)
    {
        $this->chatAvatarProperties["visible"] = (bool)$visible;
        return $this;
    }

    /**
     * Get the map info visibility
     *
     * @api
     * @return bool
     */
    public function getMapInfoVisible()
    {
        return $this->getProperty($this->mapInfoProperties, "visible");
    }

    /**
     * Set the map info visibility
     *
     * @api
     * @param bool $visible If the map info should be visible
     * @return static
     */
    public function setMapInfoVisible($visible)
    {
        $this->mapInfoProperties["visible"] = (bool)$visible;
        return $this;
    }

    /**
     * Get the countdown visibility
     *
     * @api
     * @return bool
     */
    public function getCountdownVisible()
    {
        return $this->getProperty($this->countdownProperties, "visible");
    }

    /**
     * Set the countdown visibility
     *
     * @api
     * @param bool $visible If the countdown should be visible
     * @return static
     */
    public function setCountdownVisible($visible)
    {
        $this->countdownProperties["visible"] = (bool)$visible;
        return $this;
    }

    /**
     * Get the Go! visibility
     *
     * @api
     * @return bool
     */
    public function getGoVisible()
    {
        return $this->getProperty($this->goProperties, "visible");
    }

    /**
     * Set the Go! visibility
     *
     * @api
     * @param bool $visible If Go! should be visible
     * @return static
     */
    public function setGoVisible($visible)
    {
        $this->goProperties["visible"] = (bool)$visible;
        return $this;
    }

    /**
     * Render the UI Properties standalone
     *
     * @return \DOMDocument
     */
    public function renderStandalone()
    {
        $domDocument                = new \DOMDocument("1.0", "utf-8");
        $domDocument->xmlStandalone = true;

        $domElement = $domDocument->createElement("ui_properties");
        $domDocument->appendChild($domElement);

        $allProperties = $this->getProperties();
        foreach ($allProperties as $property => $propertySettings) {
            if (!$propertySettings) {
                continue;
            }

            $propertyDomElement = $domDocument->createElement($property);
            $domElement->appendChild($propertyDomElement);

            foreach ($propertySettings as $settingName => $settingValue) {
                $propertyDomElement->setAttribute($settingName, var_export($settingValue, true));
            }
        }

        return $domDocument;
    }

    /**
     * Get string representation
     *
     * @return string
     */
    public function __toString()
    {
        return $this->renderStandalone()
                    ->saveXML();
    }

    /**
     * Get associative array of all properties
     *
     * @return array
     */
    protected function getProperties()
    {
        return array(
            "chat" => $this->chatProperties,
            "chat_avatar" => $this->chatAvatarProperties,
            "map_info" => $this->mapInfoProperties,
            "countdown" => $this->countdownProperties,
            "go" => $this->goProperties
        );
    }

    /**
     * Get a property value if it's set
     *
     * @param array  $properties Properties array
     * @param string $name       Property name
     * @param mixed  $default    (optional) Default value
     * @return mixed
     */
    protected function getProperty(array $properties, $name, $default = null)
    {
        return (isset($properties[$name]) ? $properties[$name] : $default);
    }

}
