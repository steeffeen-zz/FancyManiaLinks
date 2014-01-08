<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new \FML\ManiaLink();

// Label element showing the current time
$timeLabel = new \FML\Controls\Label();
$manialink->add($timeLabel);
$timeLabel->setId('Label_Time');

// Create script with plain script text
$script = new \FML\Elements\SimpleScript();
$manialink->add($script);
$scriptText = '
main() {
	declare Label_Time <=> (Page.GetFirstChild(”Label_Time");
	while (True) {
		yield;
		Label_Time.Value = CurrentDateTimeText;
	}
}';
$script->setText($scriptText);

// Print xml
$manialink->render(true);
