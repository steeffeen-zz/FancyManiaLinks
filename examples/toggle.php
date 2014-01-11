<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new FML\ManiaLink();
$script = $maniaLink->getScript();

// Add quad toggling another quad
$clickQuad = new FML\Controls\Quad();
$maniaLink->add($clickQuad);
$clickQuad->setX(-10);
$clickQuad->setSize(10, 10);
$clickQuad->setBgColor('0f0');

// Add toggled control
$toggleQuad = new FML\Controls\Quad();
$maniaLink->add($toggleQuad);
$toggleQuad->setX(10);
$toggleQuad->setSize(10, 10);
$toggleQuad->setBgColor('00f');

// Set toggling
$script->addToggle($clickQuad, $toggleQuad);

// Print xml
$maniaLink->render(true);
