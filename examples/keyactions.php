<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Add Key Actions to the Script
$script = $maniaLink->createScript();

$f1KeyAction = new \FML\Script\Features\KeyAction('F1PressedAction', 'F1');
$script->addFeature($f1KeyAction);

$f2KeyAction = new \FML\Script\Features\KeyAction('F2PressedAction', 'F2');
$script->addFeature($f2KeyAction);

// Print xml
$maniaLink->render(true);
