<?php

namespace FML\Types;

/**
 * Interface for Elements with media attributes
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
interface Playable
{

    /**
     * Set the data
     *
     * @api
     * @param string $data Media url
     * @return static
     */
    public function setData($data);

    /**
     * Set the data id to use from Dico
     *
     * @api
     * @param string $dataId Data id
     * @return static
     */
    public function setDataId($dataId);

    /**
     * Set play
     *
     * @api
     * @param bool $play If the Control should start playing automatically
     * @return static
     */
    public function setPlay($play);

    /**
     * Set looping
     *
     * @api
     * @param bool $looping If the Control should play looping
     * @return static
     */
    public function setLooping($looping);

    /**
     * Set music
     *
     * @api
     * @param bool $music If the Control represents background music
     * @return static
     */
    public function setMusic($music);

    /**
     * Set the volume
     *
     * @api
     * @param float $volume Media volume
     * @return static
     */
    public function setVolume($volume);

}
