<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create default time label
$label = new \FML\Controls\Label();
$maniaLink->addChild($label);
$label->setY(10)
      ->addClockFeature();

// Create time label without seconds
$label = new \FML\Controls\Label();
$maniaLink->addChild($label);
$label->addClockFeature(false);

// Create full date label
$label = new \FML\Controls\Label();
$maniaLink->addChild($label);
$label->setY(-10)
      ->addClockFeature(true, true);

// Print xml
echo $maniaLink;
