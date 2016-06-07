<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLinks container
$maniaLinks = new \FML\ManiaLinks();

// Create actual ManiaLink
$maniaLink = new \FML\ManiaLink();
$maniaLinks->add($maniaLink);

// Add a label
$label = new FML\Controls\Label();
$maniaLink->add($label);
$label->setText('Label');

// Add custom ui to container which disables the map info
$customUI = new \FML\CustomUI();
$maniaLinks->setCustomUI($customUI);
$customUI->setChallengeInfoVisible(false);

// Print xml
$maniaLinks->render(true);
