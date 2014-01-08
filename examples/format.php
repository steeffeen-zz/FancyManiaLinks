<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new \FML\ManiaLink();

// Create frame containing some elements
$frame = new \FML\Controls\Frame();
$manialink->add($frame);

// Create format element modifying the following labels
$format = new \FML\Elements\Format();
$frame->add($format);
$format->setBgColor('f00');
$format->setTextSize(5);
$format->setAreaColor('0f0');
$format->setStyle(\FML\Controls\Labels\Label_Text::STYLE_TextTitle2Blink);

// Create some lines without styling
$y = 50;
for ($i = 1; $i <= 10; $i++) {
	$label = new \FML\Controls\Label();
	$frame->add($label);
	$label->setY($y);
	$label->setText("Label #{$i}");
	
	$y -= 10.;
}

// Print xml
$manialink->render(true);
