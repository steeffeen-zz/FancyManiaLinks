<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();
$script    = $maniaLink->createScript();

// Label element showing the current time
$timeLabel = new \FML\Controls\Label();
$maniaLink->addChild($timeLabel);
$timeLabel->setId("Label_Time");

// Add custom script label to show the local date time
$scriptText = '
declare Label_Time <=> (Page.GetFirstChild("Label_Time") as CMlLabel);
Label_Time.Value = CurrentLocalDateText;
';
$script->addCustomScriptLabel(\FML\Script\ScriptLabel::LOOP, $scriptText);

// Add another custom part for fun
$timeLabel->setScriptEvents(true);
$scriptText = '
Event.Control.Scale *= 1.3;
';
$script->addCustomScriptLabel(\FML\Script\ScriptLabel::MOUSECLICK, $scriptText);
$scriptText = '
Event.Control.Scale = 1.;
';
$script->addCustomScriptLabel(\FML\Script\ScriptLabel::MOUSEOUT, $scriptText);

// Print xml
echo $maniaLink;
