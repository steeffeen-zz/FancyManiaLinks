<?php

namespace FML\Components;

use FML\Controls\Entry;
use FML\Controls\Frame;
use FML\Controls\Label;
use FML\Script\Features\ScriptFeature;
use FML\Script\Features\ValuePickerFeature;
use FML\Types\Renderable;
use FML\Types\ScriptFeatureable;

/**
 * ValuePicker Component
 *
 * @uses      Entry
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class ValuePicker implements Renderable, ScriptFeatureable
{

    /*
     * Protected properties
     */
    protected $name = null;
    protected $feature = null;

    /**
     * Create a new ValuePicker
     *
     * @api
     * @param string $name    (optional) CheckBox name
     * @param array  $values  (optional) Possible values
     * @param bool   $default (optional) Default value
     * @param Label  $label   (optional) ValuePicker label
     */
    public function __construct($name = null, array $values = array(), $default = null, Label $label = null)
    {
        $this->feature = new ValuePickerFeature();
        $this->setName($name);
        $this->setValues($values);
        $this->setDefault($default);
        $this->setLabel($label);
    }

    /**
     * Set the name
     *
     * @api
     * @param string $name ValuePicker name
     * @return static
     */
    public function setName($name)
    {
        $this->name = (string)$name;
        return $this;
    }

    /**
     * Set the possible values
     *
     * @api
     * @param array $values Possible values
     * @return static
     */
    public function setValues(array $values)
    {
        $this->feature->setValues($values);
        return $this;
    }

    /**
     * Set the default value
     *
     * @api
     * @param bool $default Default value
     * @return static
     */
    public function setDefault($default)
    {
        $this->feature->setDefault($default);
        return $this;
    }

    /**
     * Set the Label
     *
     * @api
     * @param Label $label ValuePicker Label
     * @return static
     */
    public function setLabel(Label $label = null)
    {
        $this->feature->setLabel($label);
        return $this;
    }

    /**
     * Get the Label
     *
     * @api
     * @param bool $createIfEmpty (optional) Create the Label if it's not set
     * @return Label
     */
    public function getLabel($createIfEmpty = true)
    {
        if (!$this->feature->getLabel() && $createIfEmpty) {
            $label = new Label();
            $this->setLabel($label);
        }
        return $this->feature->getLabel();
    }

    /**
     * @see ScriptFeatureable::getScriptFeatures()
     */
    public function getScriptFeatures()
    {
        return ScriptFeature::collect($this->feature, $this->getLabel(), $this->feature->getEntry());
    }

    /**
     * @see Renderable::render()
     */
    public function render(\DOMDocument $domDocument)
    {
        $frame = new Frame();

        $label = $this->getLabel();
        $frame->add($label);

        $entry = $this->buildEntry();
        $frame->add($entry);
        $this->feature->setEntry($entry);

        return $frame->render($domDocument);
    }

    /**
     * Build the hidden Entry
     *
     * @return Entry
     */
    protected function buildEntry()
    {
        $entry = new Entry();
        $entry->setVisible(false)
              ->setName($this->name);
        return $entry;
    }

}
