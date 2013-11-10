<?php

namespace FML;

/**
 * Class representing CMlFileEntry
 *
 * @author Steff
 */
class FileEntry extends Entry {
	/**
	 * Protected properties
	 */
	protected $folder = '';

	/**
	 * Set folder
	 * 
	 * @param string $folder        	
	 */
	public function setFolder($folder) {
		$this->folder = $folder;
	}
}

?>
