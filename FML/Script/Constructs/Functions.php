<?php

namespace FML\Script\Constructs;

/**
 * Script feature using functions
 *
 * @author steeffeen
 */
interface Functions {

	/**
	 * Return array of function implementations and signatures as keys
	 *
	 * @return array
	 */
	public function getFunctions();
}
