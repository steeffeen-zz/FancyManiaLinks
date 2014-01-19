<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();
$maniaLink->setBackground($maniaLink::BACKGROUND_TITLE);

// Get mood object
$mood = $maniaLink->getStylesheet()->getMood();
$mood->addSkyGradientKey(0.3, 'ff0000');
$mood->addSkyGradientKey(0.4, '00ff00');
$mood->addSkyGradientKey(0.3, '0000ff');

// Print xml
$maniaLink->render(true);
