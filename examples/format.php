<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create frame containing some elements
$frame = new \FML\Controls\Frame();
$maniaLink->add($frame);

// Create format element modifying all the children of the frame
$format = new \FML\Elements\Format();
$frame->setFormat($format);
$format->setTextSize(5);
$format->setTextColor('f00');
$format->setAreaColor('0f0');
$format->setAreaFocusColor('00f');

// Create some lines without the need of styling them
$y = 50;
for ($i = 1; $i <= 10; $i++) {
	$label = new \FML\Controls\Label();
	$frame->add($label);
	$label->setY($y);
	$label->setSize(45, 7);
	$label->setText("Label #{$i}");
	$label->setScriptEvents(true);
	
	$y -= 10.;
}

// Print xml
$maniaLink->render(true);
