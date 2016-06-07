<?php
// FIXME: mood seems not to work
// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();
$maniaLink->setBackground($maniaLink::BACKGROUND_STARS);

// Create dummy label
$label = new \FML\Controls\Label();
$maniaLink->add($label);
$label->setText('My Mood');

// Get mood object and set properties
$mood = $maniaLink->getStylesheet()->getMood();

$mood->setLightAmbientColor(0, 0, 0);
$mood->setCloudsColorMin(0.05, 0.05, 0);
$mood->setCloudsColorMax(0.2, 0.2, 0);

$mood->setLight0Color(0.672, 0.429, 0.266);
$mood->setLight0Intensity(1);
$mood->setLight0PhiAngle(-60);
$mood->setLight0ThetaAngle(140);

$mood->setLightBallColor(0.004, 0.004, 0.004);
$mood->setLightBallIntensity(1);
$mood->setLightBallRadius(20000);

$mood->setSelfIllumColor(1, 1, 0);
$mood->setFogColor(0, 0, 0);
$mood->setSkyGradientScale(1);

$mood->addSkyGradientKey(0.13, 'FFFF00');
$mood->addSkyGradientKey(0.27, 'FFFF00');
$mood->addSkyGradientKey(0.2, 'CCCC00');
$mood->addSkyGradientKey(0.4, '222200');

// Print xml
$maniaLink->render(true);
