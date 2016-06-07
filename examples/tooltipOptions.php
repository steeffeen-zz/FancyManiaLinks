<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create the tooltip label
$tooltipLabel = new \FML\Controls\Label();
$maniaLink->add($tooltipLabel);
$tooltipLabel->setY(-20);

// Create first quad
$firstQuad = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->add($firstQuad);
$firstQuad->setPosition(-20, 10);
$firstQuad->setSize(20, 20);
$firstQuad->setSubStyle($firstQuad::SUBSTYLE_1);
$firstQuad->addTooltipLabelFeature($tooltipLabel, 'First Quad');

// Create second quad
$secondQuad = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->add($secondQuad);
$secondQuad->setPosition(20, 10);
$secondQuad->setSize(20, 20);
$secondQuad->setSubStyle($secondQuad::SUBSTYLE_2);
$secondQuad->addTooltipLabelFeature($tooltipLabel, 'Second Quad', true);

// Print xml
$maniaLink->render(true);
