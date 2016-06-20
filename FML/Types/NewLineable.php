<?php

namespace FML\Types;

/**
 * Interface for Elements with autonewline attribute
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
interface NewLineable
{

    /**
     * Get auto new line
     *
     * @api
     * @return bool
     */
    public function getAutoNewLine();

    /**
     * Set auto new line
     *
     * @api
     * @param bool $autoNewLine If the Element should insert new lines automatically
     * @return static
     */
    public function setAutoNewLine($autoNewLine);

}
