<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialinks container object
$maniaLinks = new FML\ManiaLinks();

// Create actual manialink object
$maniaLink = new FML\ManiaLink();
$maniaLinks->add($maniaLink);

// Create frame containing a label
$frame = new FML\Controls\Frame();
$maniaLink->add($frame);
$label = new FML\Controls\Label();
$frame->add($label);
$label->setText('Label');

// Add custom ui to container which disables the map info
$customUI = new FML\CustomUI();
$maniaLinks->setCustomUI($customUI);
$customUI->setChallengeInfoVisible(false);

// Print xml
$maniaLinks->render(true);
