<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Label element showing the current time
$timeLabel = new \FML\Controls\Label();
$maniaLink->addChild($timeLabel);
$timeLabel->setId('Label_Time');

// Create script with plain script text showing the local date time
$script = new \FML\Elements\SimpleScript();
$maniaLink->addChild($script);
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
echo $maniaLink;
