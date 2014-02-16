<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();
$script = $maniaLink->getScript();

// Create time label
$label = new \FML\Controls\Label();
$maniaLink->add($label);
$label->setY(5);
$script->addTimeLabel($label);

// Create full date label
$label = new \FML\Controls\Label();
$maniaLink->add($label);
$label->setY(-5);
$script->addTimeLabel($label, true);

// Print xml
$maniaLink->render(true);
