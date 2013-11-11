<?php

namespace FML;

/**
 * Interface for elements with scriptevents attribute
 *
 * @author steeffeen
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
