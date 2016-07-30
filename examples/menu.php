<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create menu item list
$menuItem0 = new \FML\Controls\Labels\Label_Button();
$maniaLink->add($menuItem0);
$menuItem0->setPosition(-50, 10)
          ->setStyle($menuItem0::STYLE_CardButtonSmall)
          ->setText('Neutral');

$menuItem1 = new \FML\Controls\Labels\Label_Button();
$maniaLink->add($menuItem1);
$menuItem1->setPosition(-50, 0)
          ->setStyle($menuItem1::STYLE_CardButtonSmall)
          ->setText('Blue Team');

$menuItem2 = new \FML\Controls\Labels\Label_Button();
$maniaLink->add($menuItem2);
$menuItem2->setPosition(-50, -10)
          ->setStyle($menuItem2::STYLE_CardButtonSmall)
          ->setText('Red Team');

// Create subMenus
$subMenu0 = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->add($subMenu0);
$subMenu0->setPosition(10, 0)
         ->setSize(50, 50)
         ->setSubStyle($subMenu0::SUBSTYLE_0);

$subMenu1 = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->add($subMenu1);
$subMenu1->setPosition(10, 0)
         ->setSize(50, 50)
         ->setSubStyle($subMenu1::SUBSTYLE_1)
         ->setVisible(false);

$subMenu2 = new \FML\Controls\Quads\Quad_Emblems();
$maniaLink->add($subMenu2);
$subMenu2->setPosition(10, 0)
         ->setSize(50, 50)
         ->setSubStyle($subMenu2::SUBSTYLE_2)
         ->setVisible(false);

// Create menu
$menu = new \FML\Script\Features\Menu();
$maniaLink->createScript()
          ->addFeature($menu);
$menu->addElement($menuItem0, $subMenu0)
     ->addElement($menuItem1, $subMenu1, true)
     ->addElement($menuItem2, $subMenu2);

// Print xml
$maniaLink->render(true);
