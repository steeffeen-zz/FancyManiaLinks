<?php

namespace FML\Script;

/**
 * Builder Class offering methods to build ManiaScript
 *
 * @author steeffeen
 */
abstract class Builder {

	/**
	 * Build a ManiaScript Texts Array with the given Elements
	 *
	 * @param array $elements        	
	 * @param bool $associative        	
	 * @return string
	 */
	public static function getTextsArray(array $elements, $associative = false) {
		$arrayText = '[';
		$elementsCount = count($elements);
		if ($elementsCount <= 0) {
			$arrayText .= '""';
		}
		else {
			$i = 1;
			foreach ($elements as $key => $value) {
				if ($associative) {
					$arrayText .= '"' . $key . '"=>';
				}
				$arrayText .= '"' . $value . '"';
				if ($i < $elementsCount) {
					$arrayText .= ',';
					$i++;
				}
			}
		}
		$arrayText .= ']';
		return $arrayText;
	}
}
