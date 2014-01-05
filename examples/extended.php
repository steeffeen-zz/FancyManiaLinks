<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new FML\ManiaLink();

// Create frame containing some elements
$frame = new FML\Controls\Frame();
$manialink->add($frame);

// Add dark background for complete window
$backgroundQuad = new FML\Controls\Quad();
$frame->add($backgroundQuad);
$backgroundQuad->setZ(-3);
$backgroundQuad->setSize(400, 200);
$backgroundQuad->setBgColor('222');

// Create ManiaPlanet icon in top right corner
$mpIconQuad = new FML\Controls\Quads\Quad_ManiaPlanetLogos();
$frame->add($mpIconQuad);
$mpIconQuad->setPosition(120, 70);
$mpIconQuad->setSize(80, 20);
$mpIconQuad->setSubStyle(FML\Controls\Quads\Quad_ManiaPlanetLogos::SUBSTYLE_ManiaPlanetLogoWhite);

// Create emblem on the left side
$emblemQuad = new FML\Controls\Quads\Quad_Emblems();
$frame->add($emblemQuad);
$emblemQuad->setX(-110);
$emblemQuad->setSize(70, 70);
$emblemQuad->setSubStyle(FML\Controls\Quads\Quad_Emblems::SUBSTYLE_1);

// Create emblem on the right side
$emblemQuad = new FML\Controls\Quads\Quad_Emblems();
$frame->add($emblemQuad);
$emblemQuad->setX(110);
$emblemQuad->setSize(70, 70);
$emblemQuad->setSubStyle(FML\Controls\Quads\Quad_Emblems::SUBSTYLE_2);

// Create center background
$backgroundQuad = new FML\Controls\Quads\Quad_UiSMSpectatorScoreBig();
$frame->add($backgroundQuad);
$backgroundQuad->setPosition(0, -1, -2);
$backgroundQuad->setSize(100, 150);
$backgroundQuad->setSubStyle(FML\Controls\quads\Quad_UiSMSpectatorScoreBig::SUBSTYLE_PlayerSlot);

// Create some lines with several elements
$y = 50;
for ($i = 1; $i <= 10; $i++) {
	// Create subFrame for the line
	$lineFrame = new FML\Controls\Frame();
	$frame->add($lineFrame);
	$lineFrame->setY($y);
	
	// Line background
	$backgroundQuad = new FML\Controls\Quads\Quad_ManiaplanetSystem();
	$lineFrame->add($backgroundQuad);
	$backgroundQuad->setSize(70, 8);
	$backgroundQuad->setSubStyle(FML\Controls\Quads\Quad_ManiaplanetSystem::SUBSTYLE_BgDialog);
	
	// Line icon
	$iconQuad = new FML\Controls\Quads\Quad_BgRaceScore2();
	$lineFrame->add($iconQuad);
	$iconQuad->setPosition(-29, 0, 0);
	$iconQuad->setSize(6, 6);
	$iconQuad->setSubStyle(FML\Controls\Quads\Quad_BgRaceScore2::SUBSTYLE_Fame);
	
	// Text label
	$label = new FML\Controls\Labels\Label_Text();
	$lineFrame->add($label);
	$label->setStyle(FML\Controls\Labels\Label_Text::STYLE_TextTitle1);
	$label->setText("Label #{$i}");
	
	$y -= 10.;
}

// Print xml
echo $manialink;
