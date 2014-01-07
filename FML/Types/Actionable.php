<?php

namespace FML\Types;

/**
 * Interface for Elements that support the Action Attribute
 *
 * @author steeffeen
 */
interface Actionable {

	/**
	 * Set action
	 *
	 * @param string $action Action Name
	 */
	public function setAction($action);
}
