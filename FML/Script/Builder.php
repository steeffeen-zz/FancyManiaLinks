<?php

namespace FML\Script;

/**
 * Builder Class offering Methods to build ManiaScript
 *
 * @author steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
abstract class Builder {

	/**
	 * Build a Label Implementation Block
	 *
	 * @param string $labelName Name of the Label
	 * @param string $implementationCode Label Implementation Coding (without declaration)
	 * @param bool $isolate Whether the Code should be isolated in an own Block
	 * @return string
	 */
	public static function getLabelImplementationBlock($labelName, $implementationCode, $isolate = true) {
		if ($isolate) {
			$implementationCode = 'while(False)break;{' . $implementationCode . '}';
		}
		$labelText = PHP_EOL . "***{$labelName}***" . PHP_EOL . "***{$implementationCode}***" . PHP_EOL;
		return $labelText;
	}

	/**
	 * Escape dangerous Characters in the given Text
	 *
	 * @param string $text Text to escape
	 * @return string
	 */
	public static function escapeText($text) {
		$dangers = array('\\', '"', "\n");
		$replacements = array('\\\\', '\\"', '\\n');
		$escapedText = str_ireplace($dangers, $replacements, $text);
		return $escapedText;
	}

	/**
	 * Get the Real String-Representation of the given Value
	 *
	 * @param float $value The Float Value to convert to a ManiaScript Real
	 * @return string
	 */
	public static function getReal($value) {
		$value = (float) $value;
		$stringVal = (string) $value;
		if (!fmod($value, 1)) $stringVal .= '.';
		return $stringVal;
	}

	/**
	 * Get the Boolean String-Representation of the given Value
	 *
	 * @param bool $value The Value to convert to a ManiaScript Boolean
	 * @return string
	 */
	public static function getBoolean($value) {
		$bool = (bool) $value;
		if ($bool) {
			return "True";
		}
		return "False";
	}

	/**
	 * Get the Include Command for the given File and Namespace
	 *
	 * @param string $file Include File
	 * @param string $namespace Include Namespace
	 * @return string
	 */
	public static function getInclude($file, $namespace) {
		$includeText = "#Include \"{$file}\" as {$namespace}" . PHP_EOL;
		return $includeText;
	}

	/**
	 * Get the Constant Command for the given Name and Value
	 *
	 * @param string $name Constant Name
	 * @param string $value Constant Value
	 * @return string
	 */
	public static function getConstant($name, $value) {
		if (is_string($value)) {
			$value = '"' . $value . '"';
		}
		$constantText = "#Const	{$name}	{$value}" . PHP_EOL;
		return $constantText;
	}
}
