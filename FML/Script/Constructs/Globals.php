<?php

namespace FML\Script\Constructs;

/**
 * Script feature using globals
 *
 * @author steeffeen
 */
interface Globals {

	/**
	 * Return array with global variable types with variable names as keys
	 *
	 * @return array
	 */
	public function getGlobals();
}
