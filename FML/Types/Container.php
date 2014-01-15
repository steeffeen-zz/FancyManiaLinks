<?php

namespace FML\Types;

use FML\Controls\Control;

/**
 * Interface for Element being able to contain other Controls
 *
 * @author steeffeen
 */
interface Container {

	/**
	 * Add a new Child Control
	 *
	 * @param Control $child The Child Control to add
	 */
	public function add(Control $child);

	/**
	 * Remove all Children
	 */
	public function removeChildren();
}
