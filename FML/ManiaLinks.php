<?php

namespace FML;

/**
 * Class holding several ManiaLinks at once
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class ManiaLinks
{

    /*
     * Protected Properties
     */
    protected $encoding = 'utf-8';
    protected $tagName = 'manialinks';
    /** @var ManiaLink[] $children */
    protected $children = array();
    /** @var CustomUI $customUI */
    protected $customUI = null;

    /**
     * Create a new ManiaLinks object
     *
     * @api
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * Set the XML encoding
     *
     * @api
     * @param string $encoding XML encoding
     * @return static
     */
    public function setXmlEncoding($encoding)
    {
        $this->encoding = (string)$encoding;
        return $this;
    }

    /**
     * Add a child ManiaLink
     *
     * @api
     * @param ManiaLink $child Child ManiaLink
     * @return static
     */
    public function add(ManiaLink $child)
    {
        if (!in_array($child, $this->children, true)) {
            array_push($this->children, $child);
        }
        return $this;
    }

    /**
     * Remove all child ManiaLinks
     *
     * @api
     * @return static
     */
    public function removeChildren()
    {
        $this->children = array();
        return $this;
    }

    /**
     * Get the CustomUI
     *
     * @api
     * @param bool $createIfEmpty (optional) If the CustomUI object should be created if it's not set
     * @return CustomUI
     */
    public function getCustomUI($createIfEmpty = true)
    {
        if (!$this->customUI && $createIfEmpty) {
            $this->setCustomUI(new CustomUI());
        }
        return $this->customUI;
    }

    /**
     * Set the CustomUI
     *
     * @api
     * @param CustomUI $customUI CustomUI object
     * @return static
     */
    public function setCustomUI(CustomUI $customUI)
    {
        $this->customUI = $customUI;
        return $this;
    }

    /**
     * Render the ManiaLinks object
     *
     * @param bool (optional) $echo If the XML text should be echoed and the Content-Type header should be set
     * @return \DOMDocument
     */
    public function render($echo = false)
    {
        $domDocument                = new \DOMDocument('1.0', $this->encoding);
        $domDocument->xmlStandalone = true;
        $maniaLinks                 = $domDocument->createElement($this->tagName);
        $domDocument->appendChild($maniaLinks);
        foreach ($this->children as $child) {
            $childXml = $child->render(false, $domDocument);
            $maniaLinks->appendChild($childXml);
        }
        if ($this->customUI) {
            $customUIElement = $this->customUI->render($domDocument);
            $maniaLinks->appendChild($customUIElement);
        }
        if ($echo) {
            header('Content-Type: application/xml; charset=utf-8;');
            echo $domDocument->saveXML();
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
        return $this->render()
                    ->saveXML();
    }

}
