<?php

namespace FML\Script\Features;

use FML\Controls\Control;
use FML\Script\Script;
use FML\Script\ScriptLabel;
use FML\Script\Builder;
use FML\Types\Actionable;
use FML\Types\Scriptable;
use FML\Controls\Entry;

/**
 * Script Feature for submitting an Entry
 *
 * @author steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class EntrySubmit extends ScriptFeature {
	/*
	 * Protected Properties
	 */
	protected $entry = null;
	protected $url = null;

	/**
	 * Construct a new Entry Submit Trigger Feature
	 *
	 * @param Entry $entry (optional) Entry Control
	 * @param string $url (optional) Submit Url
	 */
	public function __construct(Entry $entry = null, $url = null) {
		$this->setEntry($entry);
		$this->setUrl($url);
	}

	/**
	 * Set the Entry
	 *
	 * @param Entry $entry Entry Control
	 * @return \FML\Script\Features\EntrySubmit
	 */
	public function setEntry(Entry $entry) {
		$entry->checkId();
		$entry->setScriptEvents(true);
		$this->entry = $entry;
		return $this;
	}

	/**
	 * Set the Submit Url
	 *
	 * @param string $url Submit Url
	 * @return \FML\Script\Features\EntrySubmit
	 */
	public function setUrl($url) {
		$this->url = (string) $url;
		return $this;
	}

	/**
	 *
	 * @see \FML\Script\Features\ScriptFeature::prepare()
	 */
	public function prepare(Script $script) {
		$script->appendGenericScriptLabel(ScriptLabel::ENTRYSUBMIT, $this->getScriptText());
		return $this;
	}

	/**
	 * Get the Script Text
	 *
	 * @return string
	 */
	protected function getScriptText() {
		$controlId = $this->entry->getId(true);
		$url = $this->buildFullUrl();
		$scriptText = "
if (Event.Control.ControlId == \"{$controlId}\") {
	OpenLink(\"{$url}\", CMlScript::LinkType::Goto);
}";
		return $scriptText;
	}

	/**
	 * Build the full Submit Url with the Entry Name Parameter
	 *
	 * @return string
	 */
	protected function buildFullUrl() {
		$url = $this->url;
		$paramsBegin = stripos($url, '?');
		if (!is_int($paramsBegin) || $paramsBegin < 0) {
			$url .= '?';
		}
		else {
			$url .= '&';
		}
		$entryName = Builder::escapeText($this->entry->getName());
		$url .= "{$entryName}={$entryName}";
		return $url;
	}
}
