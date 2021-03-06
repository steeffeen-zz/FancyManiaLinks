<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Label element
$testLabel = new \FML\Controls\Label();
$maniaLink->addChild($testLabel);
$testLabel->setText('Click Me!');

// Add custom script text to show a click counter
$scriptText = '
declare Counter for Label = 0;
Counter += 1;
Label.Value = Counter^"x! Click Me Again!";
';
$testLabel->addScriptText($scriptText);

// Print xml
echo $maniaLink;
