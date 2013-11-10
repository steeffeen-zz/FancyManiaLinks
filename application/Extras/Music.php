<?php

namespace FML;

/**
 * Class representing music
 *
 * @author Steff
 */
class Music implements Addable {
	/**
	 * Protected properties
	 */
	protected $data = '';

	/**
	 * Set data
	 * 
	 * @param string $data        	
	 */
	public function setData($data) {
		$this->data = $data;
	}
}

?>
