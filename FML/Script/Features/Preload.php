<?php

namespace FML\Script\Features;

use FML\Script\Builder;
use FML\Script\Script;
use FML\Script\ScriptLabel;

/**
 * Script Feature for Image Preloading
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Preload extends ScriptFeature
{

    /*
     * Protected properties
     */
    protected $imageUrls = array();

    /**
     * Construct a new Preload
     *
     * @api
     * @param string[] $imageUrls Image Urls
     */
    public function __construct(array $imageUrls = null)
    {
        if ($imageUrls) {
            $this->setImageUrls($imageUrls);
        }
    }

    /**
     * Set Image Urls to preload
     *
     * @param string[] $imageUrls Image Urls
     * @return Preload
     */
    public function setImageUrls(array $imageUrls = array())
    {
        $this->imageUrls = $imageUrls;
        return $this;
    }

    /**
     * @see ScriptFeature::prepare()
     */
    public function prepare(Script $script)
    {
        $script->appendGenericScriptLabel(ScriptLabel::ONINIT, $this->getScriptText());
        return $this;
    }

    /**
     * Get the script text
     *
     * @return string
     */
    protected function getScriptText()
    {
        $scriptText = "";
        foreach ($this->imageUrls as $imageUrl) {
            $escapedImageUrl = Builder::escapeText($imageUrl, true);
            $scriptText .= "
PreloadImage({$escapedImageUrl});";
        }
        return $scriptText;
    }

}
