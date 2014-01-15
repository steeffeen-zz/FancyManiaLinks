<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create frame model containing elements
$frameModel = new \FML\Elements\FrameModel();
$maniaLink->add($frameModel);
$frameModel->setId('MyFrameModel');

$label = new \FML\Controls\Label();
$frameModel->addChild($label);
$label->setText('Neat!');

// Create frame instances at various positions
$frameInstance = new \FML\Controls\FrameInstance();
$maniaLink->add($frameInstance);
$frameInstance->setModel($frameModel);
$frameInstance->setX(10);

$frameInstance = new \FML\Controls\FrameInstance();
$maniaLink->add($frameInstance);
$frameInstance->setModelId($frameModel->getId());
$frameInstance->setX(-10);

// Print xml
$maniaLink->render(true);
