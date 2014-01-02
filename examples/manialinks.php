<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialinks container object
$manialinks = new FML\ManiaLinks();

// Create actual manialink object
$manialink = new FML\ManiaLink();
$manialinks->add($manialink);

// Create frame containing a label
$frame = new FML\Controls\Frame();
$manialink->add($frame);
$label = new FML\Controls\Label();
$frame->add($label);
$label->setText('Label');

// Add custom ui to container which disables the map info
$customUI = new FML\CustomUI();
$manialinks->setCustomUI($customUI);
$customUI->setChallengeInfoVisible(false);

// Print xml
$manialinks->render(true);
