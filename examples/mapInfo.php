<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();
$script = $maniaLink->getScript();

// Create map info button
$mapInfoQuad = new \FML\Controls\Quads\Quad_Icons128x128_1();
$maniaLink->add($mapInfoQuad);
$mapInfoQuad->setSize(30, 30);
$mapInfoQuad->setSubStyle($mapInfoQuad::SUBSTYLE_Editor);

// Set map info link
$script->addMapInfoButton($mapInfoQuad);

// Print xml
$maniaLink->render(true);
