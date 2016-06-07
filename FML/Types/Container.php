<?php

namespace FML\Types;

use FML\Elements\Format;

/**
 * Interface for Element being able to contain other Controls
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
interface Container {

	/**
	 * Add a new child
	 *
	 * @api
	 * @param Renderable $child Child Control to add
	 * @return static
	 */
	public function add(Renderable $child);

	/**
	 * Remove all children
	 *
	 * @api
	 * @return static
	 */
	public function removeChildren();

	/**
	 * Set the Format
	 *
	 * @api
	 * @param Format $format New Format object
	 * @return static
	 */
	public function setFormat(Format $format);

	/**
	 * Get the Format
	 *
	 * @api
	 * @param bool $createIfEmpty (optional) If the Format object should be created if it's not set
	 * @return Format
	 */
	public function getFormat($createIfEmpty = true);
	
}
