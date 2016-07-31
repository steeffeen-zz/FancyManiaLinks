<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create pages
$page0 = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->addChild($page0);
$page0->setSize(50, 50)
      ->setSubStyle($page0::SUBSTYLE_0);

$page1 = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->addChild($page1);
$page1->setSize(50, 50)
      ->setSubStyle($page1::SUBSTYLE_1);

$page2 = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->addChild($page2);
$page2->setSize(50, 50)
      ->setSubStyle($page2::SUBSTYLE_2);

// Create paging buttons
$leftPagerQuad = new \FML\Controls\Quads\Quad_Icons64x64_1();
$maniaLink->addChild($leftPagerQuad);
$leftPagerQuad->setPosition(-20, -30)
              ->setSize(10, 10)
              ->setSubStyle($leftPagerQuad::SUBSTYLE_ArrowPrev);

$rightPagerQuad = new \FML\Controls\Quads\Quad_Icons64x64_1();
$maniaLink->addChild($rightPagerQuad);
$rightPagerQuad->setPosition(20, -30)
               ->setSize(10, 10)
               ->setSubStyle($rightPagerQuad::SUBSTYLE_ArrowNext);

// Create counter label (optional)
$counterLabel = new \FML\Controls\Label();
$maniaLink->addChild($counterLabel);
$counterLabel->setY(-30);

// Create paging
$paging = new \FML\Script\Features\Paging();
$maniaLink->createScript()
          ->addFeature($paging);

// Set pagers
$paging->addButtonControl($rightPagerQuad)
       ->addButtonControl($leftPagerQuad);

// Set pages
$paging->addPageControl($page0)
       ->addPageControl($page1)
       ->addPageControl($page2);

// Set page label
$paging->setLabel($counterLabel);

// Print xml
echo $maniaLink;
