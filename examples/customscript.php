<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Label element showing the current time
$timeLabel = new \FML\Controls\Label();
$maniaLink->add($timeLabel);
$timeLabel->setId('Label_Time');

// Create script
$script = $maniaLink->getScript();

// Add custom part to show the local date time
$scriptText = '
declare Label_Time <=> (Page.GetFirstChild("Label_Time") as CMlLabel);
Label_Time.Value = CurrentLocalDateText;
';
$script->addCustomScriptText($scriptText);

// Add another custom part for fun
$timeLabel->setScriptEvents(true);
$scriptText = '
Event.Control.Scale *= 1.3;
';
$script->addCustomScriptText($scriptText, $script::LABEL_MOUSECLICK);
$scriptText = '
Event.Control.Scale = 1.;
';
$script->addCustomScriptText($scriptText, $script::LABEL_MOUSEOUT);

// Print xml
$maniaLink->render(true);
