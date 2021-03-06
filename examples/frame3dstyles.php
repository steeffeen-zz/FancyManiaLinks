<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();
$maniaLink->setBackground($maniaLink::BACKGROUND_STARS);

// Create stylesheet object
$stylesheet = new \FML\Stylesheet\Stylesheet();
$maniaLink->setStylesheet($stylesheet);

// Create new frame3d style
$style3d = new \FML\Stylesheet\Style3d();
$stylesheet->addStyle3d($style3d);
$style3d->setId('MyStyle')
        ->setColor('aa0000')
        ->setLightColor('00aa00')
        ->setThickness(-5);

// Create frame3d using the style
$frame3d = new \FML\Controls\Frame3d();
$maniaLink->addChild($frame3d);
$frame3d->setY(30)
        ->setStyle3d($style3d)
        ->setSize(100, 40);

$label = new \FML\Controls\Label();
$frame3d->addChild($label);
$label->setTextColor('000')
      ->setText('My Style');

// Print xml
echo $maniaLink;
