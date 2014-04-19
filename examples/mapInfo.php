<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create map info button
$mapInfoQuad = new \FML\Controls\Quads\Quad_Icons128x128_1();
$maniaLink->add($mapInfoQuad);
$mapInfoQuad->setSize(30, 30);
$mapInfoQuad->setSubStyle($mapInfoQuad::SUBSTYLE_Editor);
$mapInfoQuad->addMapInfoFeature();

// Print xml
$maniaLink->render(true);
