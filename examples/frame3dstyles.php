<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Get stylesheet object
$stylesheet = $maniaLink->getStylesheet();

// Create new frame3d style
$style3d = new \FML\Stylesheet\Style3d();
$stylesheet->addStyle3d($style3d);
$style3d->setColor('ff0000');
$style3d->setLightColor('00ff00');

// Create frame3d using the style
$frame3d = new \FML\Controls\Frame3d();
$maniaLink->add($frame3d);
$frame3d->setStyle3d($style3d);
$frame3d->setSize(100, 40);

// Print xml
$maniaLink->render(true);
