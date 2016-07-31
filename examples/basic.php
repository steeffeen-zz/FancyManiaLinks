<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create frame containing some elements
$frame = new \FML\Controls\Frame();
$maniaLink->addChild($frame);

// Create some lines with several elements
$y = 50;
for ($i = 1; $i <= 10; $i++) {
    // Line background
    $backgroundQuad = new \FML\Controls\Quads\Quad_ManiaplanetSystem();
    $frame->addChild($backgroundQuad);
    $backgroundQuad->setY($y)
                   ->setSize(70, 8)
                   ->setSubStyle($backgroundQuad::SUBSTYLE_BgDialog);

    // Text label
    $label = new \FML\Controls\Labels\Label_Text();
    $frame->addChild($label);
    $label->setY($y)
          ->setStyle($label::STYLE_TextTitle1)
          ->setText("Label #{$i}");

    $y -= 10.;
}

// Print xml
echo $maniaLink;
