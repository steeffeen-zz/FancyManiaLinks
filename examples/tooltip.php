<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new FML\ManiaLink();

// Create quad for which a tooltip will be shown
$quad = new FML\Controls\Quads\Quad_Emblems();
$maniaLink->add($quad);
$quad->setSize(50, 50);
$quad->setSubStyle($quad::SUBSTYLE_1);

// Create the tooltip quad
$tooltipQuad = new FML\Controls\Quads\Quad_Emblems();
$maniaLink->add($tooltipQuad);
$tooltipQuad->setPosition(50, 50);
$tooltipQuad->setSize(50, 50);
$tooltipQuad->setSubStyle($tooltipQuad::SUBSTYLE_2);

// Create script
$script = new FML\Script\Script();
$maniaLink->setScript($script);

// Add tooltip
$script->addTooltip($quad, $tooltipQuad);

// Print xml
$maniaLink->render(true);
