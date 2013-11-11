<?php

namespace FML;

/**
 * Interface for elements with formatable text
 *
 * @author steeffeen
 */
interface TextFormatable {
	/**
	 * Protected properties
	 */
	protected $textSize = 3;
	protected $textColor = '';
	protected $areaColor = '';
	protected $areaFocusColor = '';

	/**
	 * Set text size
	 *
	 * @param int $textSize        	
	 */
	public function setTextSize($textSize);

	/**
	 * Set text color
	 *
	 * @param string $textColor        	
	 */
	public function setTextColor($textColor);

	/**
	 * Set area color
	 * 
	 * @param string $areaColor        	
	 */
	public function setAreaColor($areaColor);

	/**
	 * Set area focus color
	 * 
	 * @param string $areaFocusColor        	
	 */
	public function setAreaFocusColor($areaFocusColor);
}

?>
