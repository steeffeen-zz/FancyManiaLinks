<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create the tooltip quad
$tooltipQuad = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->add($tooltipQuad);
$tooltipQuad->setPosition(50, 50);
$tooltipQuad->setSize(50, 50);
$tooltipQuad->setSubStyle($tooltipQuad::SUBSTYLE_2);

// Create quad for which a tooltip will be shown
$quad = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->add($quad);
$quad->setSize(50, 50);
$quad->setSubStyle($quad::SUBSTYLE_1);
$quad->addTooltipFeature($tooltipQuad);

// Print xml
$maniaLink->render(true);
