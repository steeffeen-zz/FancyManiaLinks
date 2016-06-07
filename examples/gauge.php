<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Gauge fill status
$gaugeFillStatus = 0.75;

// Create gauge element
$gauge = new \FML\Controls\Gauge();
$maniaLink->add($gauge);
$gauge->setSize(100, 30);
$gauge->setColor('0f5');
$gauge->setDrawBg(false);
$gauge->setRatio($gaugeFillStatus);

// Create label for gauge value
$label = new \FML\Controls\Labels\Label_Text();
$maniaLink->add($label);
$label->setStyle($label::STYLE_TextTitle1);
$label->setY(-1.5);
$label->setTextSize(4);
$label->setText($gaugeFillStatus . '%');

// Print xml
$maniaLink->render(true);
