<?php
use FML\Controls\Quads\Quad_Emblems;

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new FML\ManiaLink();

// Create menu item list
$menuItem0 = new Quad_Emblems();
$maniaLink->add($menuItem0);
$menuItem0->setPosition(-50, 30);
$menuItem0->setSize(20, 20);
$menuItem0->setSubStyle(Quad_Emblems::SUBSTYLE_0);

$menuItem1 = new Quad_Emblems();
$maniaLink->add($menuItem1);
$menuItem1->setPosition(-50, 0);
$menuItem1->setSize(20, 20);
$menuItem1->setSubStyle(Quad_Emblems::SUBSTYLE_1);

$menuItem2 = new Quad_Emblems();
$maniaLink->add($menuItem2);
$menuItem2->setPosition(-50, -30);
$menuItem2->setSize(20, 20);
$menuItem2->setSubStyle(Quad_Emblems::SUBSTYLE_2);

// Create subMenus
$subMenu0 = new Quad_Emblems();
$maniaLink->add($subMenu0);
$subMenu0->setPosition(10, 0);
$subMenu0->setSize(50, 50);
$subMenu0->setSubStyle(Quad_Emblems::SUBSTYLE_0);

$subMenu1 = new Quad_Emblems();
$maniaLink->add($subMenu1);
$subMenu1->setPosition(10, 0);
$subMenu1->setSize(50, 50);
$subMenu1->setSubStyle(Quad_Emblems::SUBSTYLE_1);
$subMenu1->setVisible(false);

$subMenu2 = new Quad_Emblems();
$maniaLink->add($subMenu2);
$subMenu2->setPosition(10, 0);
$subMenu2->setSize(50, 50);
$subMenu2->setSubStyle(Quad_Emblems::SUBSTYLE_2);
$subMenu2->setVisible(false);

// Create script
$script = new FML\Script\Script();
$maniaLink->setScript($script);

// Set menu
$script->addMenu($menuItem0, $subMenu0);
$script->addMenu($menuItem1, $subMenu1);
$script->addMenu($menuItem2, $subMenu2);

// Print xml
$maniaLink->render(true);
