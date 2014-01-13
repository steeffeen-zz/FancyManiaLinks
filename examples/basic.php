<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create frame containing some elements
$frame = new \FML\Controls\Frame();
$maniaLink->add($frame);

// Create some lines with several elements
$y = 50;
for ($i = 1; $i <= 10; $i++) {
	// Line background
	$backgroundQuad = new \FML\Controls\Quads\Quad_ManiaplanetSystem();
	$frame->add($backgroundQuad);
	$backgroundQuad->setY($y);
	$backgroundQuad->setSize(70, 8);
	$backgroundQuad->setSubStyle($backgroundQuad::SUBSTYLE_BgDialog);
	
	// Text label
	$label = new \FML\Controls\Labels\Label_Text();
	$frame->add($label);
	$label->setY($y);
	$label->setStyle($label::STYLE_TextTitle1);
	$label->setText("Label #{$i}");
	
	$y -= 10.;
}

// Print xml
$maniaLink->render(true);
