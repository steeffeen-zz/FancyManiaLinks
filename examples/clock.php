<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create default time label
$label = new \FML\Controls\Label();
$maniaLink->add($label);
$label->setY(10);
$label->addClockFeature();

// Create time label without seconds
$label = new \FML\Controls\Label();
$maniaLink->add($label);
$label->addClockFeature(false);

// Create full date label
$label = new \FML\Controls\Label();
$maniaLink->add($label);
$label->setY(-10);
$label->addClockFeature(true, true);

// Print xml
$maniaLink->render(true);
