<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Add toggled control
$toggleQuad = new \FML\Controls\Quad();
$maniaLink->add($toggleQuad);
$toggleQuad->setX(10);
$toggleQuad->setSize(10, 10);
$toggleQuad->setBgColor('00f');

// Add quad toggling another quad
$clickQuad = new \FML\Controls\Quad();
$maniaLink->add($clickQuad);
$clickQuad->setX(-10);
$clickQuad->setSize(10, 10);
$clickQuad->setBgColor('0f0');
$clickQuad->addToggleFeature($toggleQuad);

// Print xml
$maniaLink->render(true);
