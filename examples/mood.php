<?php
// FIXME: mood seems not to work
// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();
$maniaLink->setBackground($maniaLink::BACKGROUND_STARS);

// Create dummy label
$label = new \FML\Controls\Label();
$maniaLink->addChild($label);
$label->setText("My Mood");

// Create style sheet
$stylesheet = new \FML\Stylesheet\Stylesheet();
$maniaLink->setStylesheet($stylesheet);

// Get mood object and set properties
$mood = $stylesheet->getMood();

$mood->setLightAmbientColor(0, 0, 0)
     ->setCloudsColorMin(0.05, 0.05, 0)
     ->setCloudsColorMax(0.2, 0.2, 0);

$mood->setLight0Color(0.672, 0.429, 0.266)
     ->setLight0Intensity(1)
     ->setLight0PhiAngle(-60)
     ->setLight0ThetaAngle(140);

$mood->setLightBallColor(0.004, 0.004, 0.004)
     ->setLightBallIntensity(1)
     ->setLightBallRadius(20000);

$mood->setSelfIllumColor(1, 1, 0)
     ->setFogColor(0, 0, 0)
     ->setSkyGradientScale(1);

$mood->addSkyGradientKey(0.13, 'FFFF00')
     ->addSkyGradientKey(0.27, 'FFFF00')
     ->addSkyGradientKey(0.2, 'CCCC00')
     ->addSkyGradientKey(0.4, '222200');

// Print xml
echo $maniaLink;
