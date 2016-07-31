<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Gauge fill status
$gaugeFillStatus = 0.75;

// Create gauge element
$gauge = new \FML\Controls\Gauge();
$maniaLink->addChild($gauge);
$gauge->setSize(100, 30)
      ->setColor('0f5')
      ->setDrawBackground(false)
      ->setRatio($gaugeFillStatus);

// Create label for gauge value
$label = new \FML\Controls\Labels\Label_Text();
$maniaLink->addChild($label);
$label->setStyle($label::STYLE_TextTitle1)
      ->setY(-1.5)
      ->setTextSize(4)
      ->setText($gaugeFillStatus . '%');

// Print xml
echo $maniaLink;
