<?php

namespace FML;

/**
 * Type with url attributes
 *
 * @author Steff
 */
interface Linkable {
	/**
	 * Protected properties
	 */
	protected $url = '';
	protected $manialink = '';

	/**
	 * Set url
	 *
	 * @param string $style        	
	 */
	public function setUrl($style);

	/**
	 * Set manialink
	 * 
	 * @param string $manialink        	
	 */
	public function setManialink($manialink);
}

?>
