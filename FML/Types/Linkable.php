<?php

namespace FML\Types;

/**
 * Interface for Elements with url attributes
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
interface Linkable
{

    /**
     * Set the url
     *
     * @api
     * @param string $url Link url
     * @return static
     */
    public function setUrl($url);

    /**
     * Set the url id to use from Dico
     *
     * @api
     * @param string $urlId Url id
     * @return static
     */
    public function setUrlId($urlId);

    /**
     * Set the manialink
     *
     * @api
     * @param string $manialink Manialink name
     * @return static
     */
    public function setManialink($manialink);

    /**
     * Set the manialink id to use from Dico
     *
     * @api
     * @param string $manialinkId Manialink id
     * @return static
     */
    public function setManialinkId($manialinkId);

}
