<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create map info button
$mapInfoQuad = new \FML\Controls\Quads\Quad_Icons128x128_1();
$maniaLink->addChild($mapInfoQuad);
$mapInfoQuad->setSize(30, 30)
            ->setSubStyle($mapInfoQuad::SUBSTYLE_Editor)
            ->addMapInfoFeature();

// Print xml
echo $maniaLink;
