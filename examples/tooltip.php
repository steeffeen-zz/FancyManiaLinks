<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new FML\ManiaLink();

// Create quad for which a tooltip will be shown
$quad = new FML\Controls\Quads\Quad_Emblems();
$manialink->add($quad);
$quad->setSize(50, 50);
$quad->setSubStyle($quad::SUBSTYLE_1);

// Create the tooltip quad
$tooltipQuad = new FML\Controls\Quads\Quad_Emblems();
$manialink->add($tooltipQuad);
$tooltipQuad->setPosition(50, 50);
$tooltipQuad->setSize(50, 50);
$tooltipQuad->setSubStyle($tooltipQuad::SUBSTYLE_2);

// Create script
$script = new FML\Script\Script();
$manialink->setScript($script);

// Create tooltip
$tooltips = new FML\Script\Tooltips();
$script->addFeature($tooltips);
$tooltips->add($quad, $tooltipQuad);

// Print xml
$manialink->render(true);
