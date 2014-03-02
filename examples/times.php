<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();
$script = $maniaLink->getScript();

// Create default time label
$label = new \FML\Controls\Label();
$maniaLink->add($label);
$label->setY(10);
$script->addTimeLabel($label);

// Create time label without seconds
$label = new \FML\Controls\Label();
$maniaLink->add($label);
$script->addTimeLabel($label, true);

// Create full date label
$label = new \FML\Controls\Label();
$maniaLink->add($label);
$label->setY(-10);
$script->addTimeLabel($label, false, true);

// Print xml
$maniaLink->render(true);
