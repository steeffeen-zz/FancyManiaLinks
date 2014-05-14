<?php

// TODO: test example

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Label element updating its text to the current time on click
$timeLabel = new \FML\Controls\Label();
$maniaLink->add($timeLabel);

// Add custom script label to show the local date time
$scriptText = '
declare Label_Time <=> (Event.Control as CMlLabel);
Label_Time.Value = CurrentLocalDateText;
';
$timeLabel->addCustomScriptText($scriptText);

// Print xml
$maniaLink->render(true);
