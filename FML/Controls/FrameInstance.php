<?php

namespace FML\Controls;

use FML\Elements\FrameModel;

/**
 * Class representing an instance of a Frame Model
 * (CMlFrame)
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class FrameInstance extends Control
{

    /*
     * Protected properties
     */
    protected $tagName = 'frameinstance';
    protected $modelId = null;
    /** @var FrameModel $model */
    protected $model = null;

    /**
     * Create a new Frame Instance
     *
     * @api
     * @param string $modelId   (optional) Frame Model id
     * @param string $controlId (optional) Frame id
     * @return static
     */
    public static function create($modelId = null, $controlId = null)
    {
        return new static($modelId, $controlId);
    }

    /**
     * Construct a new Frame Instance
     *
     * @api
     * @param string $modelId   (optional) Frame Model id
     * @param string $controlId (optional) Frame id
     */
    public function __construct($modelId = null, $controlId = null)
    {
        parent::__construct($controlId);
        if ($modelId !== null) {
            $this->setModelId($modelId);
        }
    }

    /**
     * @see Control::getManiaScriptClass()
     */
    public function getManiaScriptClass()
    {
        return 'CMlFrame';
    }

    /**
     * Set the Frame Model id
     *
     * @api
     * @param string $modelId Frame Model id
     * @return static
     */
    public function setModelId($modelId)
    {
        $this->modelId = (string)$modelId;
        $this->model   = null;
        return $this;
    }

    /**
     * Set the Frame Model
     *
     * @api
     * @param FrameModel $frameModel Frame Model
     * @return static
     */
    public function setModel(FrameModel $frameModel)
    {
        $this->model   = $frameModel;
        $this->modelId = null;
        return $this;
    }

    /**
     * @see Renderable::render()
     */
    public function render(\DOMDocument $domDocument)
    {
        $domElement = parent::render($domDocument);
        if ($this->model) {
            $this->model->checkId();
            $domElement->setAttribute('modelid', $this->model->getId());
        } else if ($this->modelId) {
            $domElement->setAttribute('modelid', $this->modelId);
        }
        return $domElement;
    }

}
