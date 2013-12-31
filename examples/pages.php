<?php
use FML\Controls\Quads\Quad_Emblems;
use FML\Controls\Quads\Quad_Icons64x64_1;

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new FML\ManiaLink();

// Create paging buttons
$leftPagerQuad = new Quad_Icons64x64_1();
$manialink->add($leftPagerQuad);
$leftPagerQuad->setPosition(-20, -30);
$leftPagerQuad->setSize(10, 10);
$leftPagerQuad->setSubStyle(Quad_Icons64x64_1::SUBSTYLE_ArrowPrev);

$rightPagerQuad = new Quad_Icons64x64_1();
$manialink->add($rightPagerQuad);
$rightPagerQuad->setPosition(20, -30);
$rightPagerQuad->setSize(10, 10);
$rightPagerQuad->setSubStyle(Quad_Icons64x64_1::SUBSTYLE_ArrowNext);

// Create pages
$page0 = new Quad_Emblems();
$manialink->add($page0);
$page0->setSize(50, 50);
$page0->setSubStyle(Quad_Emblems::SUBSTYLE_0);

$page1 = new Quad_Emblems();
$manialink->add($page1);
$page1->setSize(50, 50);
$page1->setSubStyle(Quad_Emblems::SUBSTYLE_1);

$page2 = new Quad_Emblems();
$manialink->add($page2);
$page2->setSize(50, 50);
$page2->setSubStyle(Quad_Emblems::SUBSTYLE_2);

// Create counter label (optional)
$counterLabel = new FML\Controls\Label();
$manialink->add($counterLabel);
$counterLabel->setY(-30);

// Create script
$script = new FML\Script\Script();
$manialink->setScript($script);

// Set pagers
$script->addPager($leftPagerQuad, -1);
$script->addPager($rightPagerQuad, 1);

// Set pages
$script->addPage($page0, 0);
$script->addPage($page1, 1);
$script->addPage($page2, 2);

// Set page label
$script->addPageLabel($counterLabel);

// Print xml
$manialink->render(true);
