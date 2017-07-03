<?php

namespace FML\Elements;

use FML\Types\Renderable;

/**
 * Class representing a ManiaLink script loaded using a template file
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2017 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class TemplateScript implements Renderable
{

    /**
     * @var string $filePath Template file path
     */
    protected $filePath = null;

    /**
     * @var mixed $parameters Parameters
     */
    protected $parameters = null;

    /**
     * Create a new TemplateScript
     *
     * @api
     * @param string $filePath   (optional) Template file path
     * @param mixed  $parameters (optional) Parameters
     * @return static
     */
    public static function create($filePath = null, $parameters = null)
    {
        return new static($filePath, $parameters);
    }

    /**
     * Construct a new TemplateScript
     *
     * @api
     * @param string $filePath   (optional) Template file path
     * @param mixed  $parameters (optional) Parameters
     */
    public function __construct($filePath = null, $parameters = null)
    {
        if ($filePath) {
            $this->setFilePath($filePath);
        }
        if ($parameters) {
            $this->setParameters($parameters);
        }
    }

    /**
     * Get the template file path
     *
     * @api
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * Set the template file path
     *
     * @api
     * @param string $filePath Template file path
     * @return static
     */
    public function setFilePath($filePath)
    {
        $this->filePath = (string)$filePath;
        return $this;
    }

    /**
     * Get the parameters
     *
     * @api
     * @return mixed
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Set the parameters
     *
     * @api
     * @param mixed $parameters Parameters
     * @return static
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * Get the compiled script text
     *
     * @param mixed $parameters (optional) Parameters
     * @return string
     */
    public function getScriptText($parameters = null)
    {
        if (!$parameters) {
            $parameters = $this->parameters;
        }

        ob_start();

        include $this->filePath;

        $scriptText = ob_get_contents();

        ob_end_clean();

        return $scriptText;
    }

    /**
     * @see Renderable::render()
     */
    public function render(\DOMDocument $domDocument)
    {
        $domElement = $domDocument->createElement("script");
        $scriptText = $this->getScriptText();
        if ($scriptText) {
            $scriptComment = $domDocument->createComment($scriptText);
            $domElement->appendChild($scriptComment);
        }
        return $domElement;
    }

}
