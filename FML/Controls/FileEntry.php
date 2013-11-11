<?php

namespace FML\Controls;

/**
 * Class representing CMlFileEntry
 *
 * @author steeffeen
 */
class FileEntry extends Entry {
	/**
	 * Protected properties
	 */
	protected $folder = '';

	/**
	 * Construct fileentry control
	 */
	public function __construct() {
		$this->name = 'fileentry';
	}

	/**
	 * Set folder
	 *
	 * @param string $folder        	
	 */
	public function setFolder($folder) {
		$this->folder = $folder;
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \FML\Entry::render()
	 */
	public function render() {
		$xml = parent::render();
		$xml->setAttribute('folder', $this->folder);
		return $xml;
	}
}

?>