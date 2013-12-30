<?php

namespace FML\Script;

/**
 * Builder Class offering Methods to build ManiaScript
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

	/**
	 * Build a Label Implementation Block
	 *
	 * @param string $labelName        	
	 * @param string $implementationCode        	
	 * @return string
	 */
	public static function getLabelImplementationBlock($labelName, $implementationCode) {
		$labelText = PHP_EOL . "***{$labelName}***" . PHP_EOL . "***{$implementationCode}***" . PHP_EOL;
		return $labelText;
	}
}
