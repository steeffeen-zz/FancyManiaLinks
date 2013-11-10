<?php

namespace FML;

/**
 * Type with scriptevents attribute
 *
 * @author Steff
 */
interface Scriptable {
	/**
	 * Protected properties
	 */
	protected $scriptEvents = 0;

	/**
	 * Set scriptevents
	 *
	 * @param bool $style        	
	 */
	public function setScriptEvents($scriptEvents);
}

?>
