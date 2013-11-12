<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new FML\ManiaLink();

// Create frame containing some elements
$frame = new FML\Controls\Frame();
$manialink->add($frame);

// Create elements
$x = 0;
$y = 50;
for ($i = 0; $i < 10; $i++) {
	$label = new FML\Controls\Label();
	$frame->add($label);
	
	// Set properties
	$label->setPosition($x, $y);
	$label->setText("Label #{$i}");
	
	$y -= 10.;
}

// Print xml
$manialink->render(true);

?>
