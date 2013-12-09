<?php
use FML\Controls\Quads\Quad_Emblems;

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new FML\ManiaLink();

// Create menu item list
$menuItem0 = new Quad_Emblems();
$manialink->add($menuItem0);
$menuItem0->setPosition(-50, 30);
$menuItem0->setSize(20, 20);
$menuItem0->setSubStyle(Quad_Emblems::SUBSTYLE_0);

$menuItem1 = new Quad_Emblems();
$manialink->add($menuItem1);
$menuItem1->setPosition(-50, 0);
$menuItem1->setSize(20, 20);
$menuItem1->setSubStyle(Quad_Emblems::SUBSTYLE_1);

$menuItem2 = new Quad_Emblems();
$manialink->add($menuItem2);
$menuItem2->setPosition(-50, -30);
$menuItem2->setSize(20, 20);
$menuItem2->setSubStyle(Quad_Emblems::SUBSTYLE_2);

// Create subMenus
$subMenu0 = new Quad_Emblems();
$manialink->add($subMenu0);
$subMenu0->setPosition(10, 0);
$subMenu0->setSize(50, 50);
$subMenu0->setSubStyle(Quad_Emblems::SUBSTYLE_0);

$subMenu1 = new Quad_Emblems();
$manialink->add($subMenu1);
$subMenu1->setPosition(10, 0);
$subMenu1->setSize(50, 50);
$subMenu1->setSubStyle(Quad_Emblems::SUBSTYLE_1);

$subMenu2 = new Quad_Emblems();
$manialink->add($subMenu2);
$subMenu2->setPosition(10, 0);
$subMenu2->setSize(50, 50);
$subMenu2->setSubStyle(Quad_Emblems::SUBSTYLE_2);

// Create script
$script = new FML\Script\Script();
$manialink->setScript($script);

// Create menu
$menus = new FML\Script\Menus();
$script->addFeature($menus);

$menuRelationships = array();
array_push($menuRelationships, array($menuItem0, $subMenu0));
array_push($menuRelationships, array($menuItem1, $subMenu1));
array_push($menuRelationships, array($menuItem2, $subMenu2));
$menus->add($menuRelationships);

// Print xml
$manialink->render(true);
