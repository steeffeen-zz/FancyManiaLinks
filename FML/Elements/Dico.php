<?php

namespace FML\Elements;

/**
 * Dictionary Element
 *
 * @author steeffeen
 */
class Dico {
	/**
	 * Constants
	 */
	// TODO: constants with full language names
	const LANG_CZ = 'cz';
	const LANG_DA = 'da';
	const LANG_DE = 'de';
	const LANG_EN = 'en';
	const LANG_ES = 'es';
	const LANG_FR = 'fr';
	const LANG_HU = 'hu';
	const LANG_IT = 'it';
	const LANG_JP = 'jp';
	const LANG_KR = 'kr';
	const LANG_NB = 'nb';
	const LANG_NL = 'nl';
	const LANG_PL = 'pl';
	const LANG_PT = 'pt';
	const LANG_PT_BR = 'pt_BR';
	const LANG_RO = 'ro';
	const LANG_RU = 'ru';
	const LANG_SK = 'sk';
	const LANG_TR = 'tr';
	const LANG_ZH = 'zh';
	
	/**
	 * Protected Properties
	 */
	protected $tagName = 'dico';
	protected $entries = array();

	/**
	 * Create a new Dictionary Object
	 *
	 * @return \FML\Elements\Dico
	 */
	public static function create() {
		$dico = new Dico();
		return $dico;
	}

	/**
	 * Construct a new Dictionary Object
	 */
	public function __construct() {
	}

	/**
	 * Set the translatable Entry for the specific Language
	 *
	 * @param string $language Language Id
	 * @param string $entryId Entry Id
	 * @param string $entryValue Translated Entry Value
	 * @return \FML\Elements\Dico
	 */
	public function setEntry($language, $entryId, $entryValue) {
		$language = (string) $language;
		$entryId = (string) $entryId;
		$entryValue = (string) $entryValue;
		if (!isset($this->entries[$language]) && $entryValue) {
			$this->entries[$language] = array();
		}
		if ($entryValue) {
			$this->entries[$language][$entryId] = $entryValue;
		}
		else {
			if (isset($this->entries[$language][$entryId])) {
				unset($this->entries[$language][$entryId]);
			}
		}
		return $this;
	}

	/**
	 * Remove Entries of the given Id
	 *
	 * @param string $entryId Entry Id that should be removed
	 * @param string $language (optional) Only remove Entries of the given Language
	 * @return \FML\Elements\Dico
	 */
	public function removeEntry($entryId, $language = null) {
		$entryId = (string) $entryId;
		if ($language) {
			$language = (string) $language;
			if (isset($this->entries[$language])) {
				unset($this->entries[$language][$entryId]);
			}
		}
		else {
			foreach ($this->entries as $language => $entries) {
				if (isset($entries[$entryId])) {
					unset($entries[$language][$entryId]);
				}
			}
		}
		return $this;
	}

	/**
	 * Remove Entries of the given Language
	 *
	 * @param string $language Language of which all Entries should be removed
	 * @param string $entryId (optional) Only remove the given Entry Id
	 * @return \FML\Elements\Dico
	 */
	public function removeLanguage($language, $entryId = null) {
		$language = (string) $language;
		if (isset($this->entries[$language])) {
			if ($entryId) {
				$entryId = (string) $entryId;
				unset($this->entries[$language][$entryId]);
			}
			else {
				unset($this->entries[$language]);
			}
		}
		return $this;
	}

	/**
	 * Remove all Entries from the Dictionary
	 *
	 * @return \FML\Elements\Dico
	 */
	public function removeEntries() {
		$this->entries = array();
		return $this;
	}

	/**
	 * Render the Dico XML Element
	 *
	 * @param \DOMDocument $domDocument DomDocument for which the Dico XML Element should be rendered
	 * @return \DOMElement
	 */
	public function render(\DOMDocument $domDocument) {
		$xmlElement = $domDocument->createElement($this->tagName);
		foreach ($this->entries as $language => $entries) {
			$languageElement = $domDocument->createElement('language');
			$languageElement->setAttribute('id', $language);
			foreach ($entries as $entryId => $entryValue) {
				$entryElement = $domDocument->createElement($entryId, $entryValue);
				$languageElement->appendChild($entryElement);
			}
			$xmlElement->appendChild($languageElement);
		}
		return $xmlElement;
	}
}
