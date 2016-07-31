<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create the tooltip label
$tooltipLabel = new \FML\Controls\Label();
$maniaLink->addChild($tooltipLabel);
$tooltipLabel->setY(-20);

// Create first quad
$firstQuad = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->addChild($firstQuad);
$firstQuad->setPosition(-20, 10)
          ->setSize(20, 20)
          ->setSubStyle($firstQuad::SUBSTYLE_1)
          ->addTooltipLabelFeature($tooltipLabel, 'First Quad');

// Create second quad
$secondQuad = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->addChild($secondQuad);
$secondQuad->setPosition(20, 10)
           ->setSize(20, 20)
           ->setSubStyle($secondQuad::SUBSTYLE_2)
           ->addTooltipLabelFeature($tooltipLabel, 'Second Quad', true);

// Print xml
echo $maniaLink;
