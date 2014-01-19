<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Label element showing the current time
$timeLabel = new \FML\Controls\Label();
$maniaLink->add($timeLabel);
$timeLabel->setId('Label_Time');

// Create script with plain script text showing the local date time
$script = new \FML\Elements\SimpleScript();
$maniaLink->add($script);
$scriptText = '
main() {
	declare Label_Time <=> (Page.GetFirstChild("Label_Time") as CMlLabel);
	while (True) {
		yield;
		Label_Time.Value = CurrentLocalDateText;
	}
}';
$script->setText($scriptText);

// Print xml
$maniaLink->render(true);
