<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create frame containing some elements
$frame = new \FML\Controls\Frame();
$maniaLink->addChild($frame);

// Add dark background for complete window
$backgroundQuad = new \FML\Controls\Quad();
$frame->addChild($backgroundQuad);
$backgroundQuad->setZ(-3)
               ->setSize(400, 200)
               ->setBackgroundColor('222');

// Create ManiaPlanet icon in top right corner
$mpIconQuad = new \FML\Controls\Quads\Quad_ManiaPlanetLogos();
$frame->addChild($mpIconQuad);
$mpIconQuad->setPosition(120, 70)
           ->setSize(80, 20)
           ->setSubStyle($mpIconQuad::SUBSTYLE_ManiaPlanetLogoWhite);

// Create emblem on the left side
$emblemQuad = new \FML\Controls\Quads\Quad_Emblems();
$frame->addChild($emblemQuad);
$emblemQuad->setX(-110)
           ->setSize(70, 70)
           ->setSubStyle($emblemQuad::SUBSTYLE_1);

// Create emblem on the right side
$emblemQuad = new \FML\Controls\Quads\Quad_Emblems();
$frame->addChild($emblemQuad);
$emblemQuad->setX(110)
           ->setSize(70, 70)
           ->setSubStyle($emblemQuad::SUBSTYLE_2);

// Create center background
$backgroundQuad = new \FML\Controls\Quads\Quad_UiSMSpectatorScoreBig();
$frame->addChild($backgroundQuad);
$backgroundQuad->setPosition(0, -1, -2)
               ->setSize(100, 150)
               ->setSubStyle($backgroundQuad::SUBSTYLE_PlayerSlot);

// Create some lines with several elements
$y = 50;
for ($i = 1; $i <= 10; $i++) {
    // Create subFrame for the line
    $lineFrame = new \FML\Controls\Frame();
    $frame->addChild($lineFrame);
    $lineFrame->setY($y);

    // Line background
    $backgroundQuad = new \FML\Controls\Quads\Quad_ManiaplanetSystem();
    $lineFrame->addChild($backgroundQuad);
    $backgroundQuad->setSize(70, 8)
                   ->setSubStyle($backgroundQuad::SUBSTYLE_BgDialog);

    // Line icon
    $iconQuad = new \FML\Controls\Quads\Quad_BgRaceScore2();
    $lineFrame->addChild($iconQuad);
    $iconQuad->setPosition(-29, 0, 0)
             ->setSize(6, 6)
             ->setSubStyle($iconQuad::SUBSTYLE_Fame);

    // Text label
    $label = new \FML\Controls\Labels\Label_Text();
    $lineFrame->addChild($label);
    $label->setStyle($label::STYLE_TextTitle1)
          ->setText("Label #{$i}");

    $y -= 10.;
}

// Print xml
echo $maniaLink;
