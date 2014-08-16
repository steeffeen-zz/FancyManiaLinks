<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create pages
$page0 = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->add($page0);
$page0->setSize(50, 50);
$page0->setSubStyle($page0::SUBSTYLE_0);

$page1 = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->add($page1);
$page1->setSize(50, 50);
$page1->setSubStyle($page1::SUBSTYLE_1);

$page2 = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->add($page2);
$page2->setSize(50, 50);
$page2->setSubStyle($page2::SUBSTYLE_2);

// Create paging buttons
$leftPagerQuad = new \FML\Controls\Quads\Quad_Icons64x64_1();
$maniaLink->add($leftPagerQuad);
$leftPagerQuad->setPosition(-20, -30);
$leftPagerQuad->setSize(10, 10);
$leftPagerQuad->setSubStyle($leftPagerQuad::SUBSTYLE_ArrowPrev);

$rightPagerQuad = new \FML\Controls\Quads\Quad_Icons64x64_1();
$maniaLink->add($rightPagerQuad);
$rightPagerQuad->setPosition(20, -30);
$rightPagerQuad->setSize(10, 10);
$rightPagerQuad->setSubStyle($rightPagerQuad::SUBSTYLE_ArrowNext);

// Create counter label (optional)
$counterLabel = new \FML\Controls\Label();
$maniaLink->add($counterLabel);
$counterLabel->setY(-30);

// Create paging
$paging = new \FML\Script\Features\Paging();
$maniaLink->getScript()->addFeature($paging);

// Set pagers
$paging->addButton($rightPagerQuad);
$paging->addButton($leftPagerQuad);

// Set pages
$paging->addPage($page0);
$paging->addPage($page1);
$paging->addPage($page2);

// Set page label
$paging->setLabel($counterLabel);

// Print xml
$maniaLink->render(true);
