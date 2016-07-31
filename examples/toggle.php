<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Add toggled control
$toggleQuad = new \FML\Controls\Quad();
$maniaLink->addChild($toggleQuad);
$toggleQuad->setX(10)
           ->setSize(10, 10)
           ->setBackgroundColor('00f');

// Add quad toggling another quad
$clickQuad = new \FML\Controls\Quad();
$maniaLink->addChild($clickQuad);
$clickQuad->setX(-10)
          ->setSize(10, 10)
          ->setBackgroundColor('0f0')
          ->addToggleFeature($toggleQuad);

// Print xml
echo $maniaLink;
