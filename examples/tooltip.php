<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create the tooltip quad
$tooltipQuad = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->addChild($tooltipQuad);
$tooltipQuad->setPosition(50, 50)
            ->setSize(50, 50)
            ->setSubStyle($tooltipQuad::SUBSTYLE_2);

// Create quad for which a tooltip will be shown
$quad = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->addChild($quad);
$quad->setSize(50, 50)
     ->setSubStyle($quad::SUBSTYLE_1)
     ->addTooltipFeature($tooltipQuad);

// Print xml
echo $maniaLink;
