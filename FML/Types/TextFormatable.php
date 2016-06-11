<?php

namespace FML\Types;

/**
 * Interface for Elements with formatable text
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
interface TextFormatable
{

    /**
     * Set the text size
     *
     * @api
     * @param int $textSize Text size
     * @return static
     */
    public function setTextSize($textSize);

    /**
     * Set the text font
     *
     * @api
     * @param string $textFont
     * @return static
     */
    public function setTextFont($textFont);

    /**
     * Set the text color
     *
     * @api
     * @param string $textColor Text color
     * @return static
     */
    public function setTextColor($textColor);

    /**
     * Set the area color
     *
     * @api
     * @param string $areaColor Area color
     * @return static
     */
    public function setAreaColor($areaColor);

    /**
     * Set the area focus color
     *
     * @api
     * @param string $areaFocusColor Area focus color
     * @return static
     */
    public function setAreaFocusColor($areaFocusColor);

}
