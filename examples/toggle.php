<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Add toggled control
$toggleQuad = new \FML\Controls\Quad();
$maniaLink->add($toggleQuad);
$toggleQuad->setX(10)
           ->setSize(10, 10)
           ->setBgColor('00f');

// Add quad toggling another quad
$clickQuad = new \FML\Controls\Quad();
$maniaLink->add($clickQuad);
$clickQuad->setX(-10)
          ->setSize(10, 10)
          ->setBgColor('0f0')
          ->addToggleFeature($toggleQuad);

// Print xml
$maniaLink->render(true);
