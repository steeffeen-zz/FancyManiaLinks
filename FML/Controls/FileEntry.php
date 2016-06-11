<?php

namespace FML\Controls;

/**
 * FileEntry Control
 * (CMlFileEntry)
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class FileEntry extends Entry
{

    /*
     * Protected properties
     */
    protected $tagName = 'fileentry';
    protected $folder = null;

    /**
     * @see Control::getManiaScriptClass()
     */
    public function getManiaScriptClass()
    {
        return 'CMlFileEntry';
    }

    /**
     * Set the base folder
     *
     * @api
     * @param string $folder Base folder
     * @return static
     */
    public function setFolder($folder)
    {
        $this->folder = (string)$folder;
        return $this;
    }

    /**
     * @see Renderable::render()
     */
    public function render(\DOMDocument $domDocument)
    {
        $domElement = parent::render($domDocument);
        if ($this->folder) {
            $domElement->setAttribute('folder', $this->folder);
        }
        return $domElement;
    }

}
