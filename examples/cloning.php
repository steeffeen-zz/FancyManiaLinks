<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create content frame
$frame = new \FML\Controls\Frame();
$maniaLink->add($frame);

// Create first label with various styling attributes
$firstLabel = new \FML\Controls\Labels\Label_Text();
$frame->add($firstLabel);
$firstLabel->setX(-20)
           ->setStyle($firstLabel::STYLE_TextTitle1)
           ->setTextSize(3)
           ->setText('Label 1');

// Create cloned second label and adjust only the position and text
$secondLabel = clone $firstLabel;
$frame->add($secondLabel);
$secondLabel->setX(20)
            ->setText('Label 2');

// Print xml
$maniaLink->render(true);
