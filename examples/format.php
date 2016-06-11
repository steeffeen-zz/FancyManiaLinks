<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create frame containing some elements
$frame = new \FML\Controls\Frame();
$maniaLink->add($frame);

// Create format element modifying all the children of the frame
$format = new \FML\Elements\Format();
$frame->setFormat($format);
$format->setTextSize(5)
       ->setTextColor('f00')
       ->setAreaColor('0f0')
       ->setAreaFocusColor('00f');

// Create some lines without the need of styling them
$y = 50;
for ($i = 1; $i <= 10; $i++) {
    $label = new \FML\Controls\Label();
    $frame->add($label);
    $label->setY($y)
          ->setSize(45, 7)
          ->setText("Label #{$i}")
          ->setScriptEvents(true);

    $y -= 10.;
}

// Print xml
$maniaLink->render(true);
