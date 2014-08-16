<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create frame model containing elements
$frameModel = new \FML\Elements\FrameModel();
$maniaLink->add($frameModel);
$frameModel->setId('MyFrameModel');

$label = new \FML\Controls\Label();
$frameModel->add($label);
$label->setText('Neat!');

$quad = new \FML\Controls\Quads\Quad_Copilot();
$frameModel->add($quad);
$quad->setY(-10);
$quad->setSize(10, 10);
$quad->setSubStyle($quad::SUBSTYLE_UpGood);

$quad = new \FML\Controls\Quads\Quad_Copilot();
$frameModel->add($quad);
$quad->setY(10);
$quad->setSize(10, 10);
$quad->setSubStyle($quad::SUBSTYLE_Down);

// Create frame instances at various positions
for ($i = -5; $i <= 5; $i++) {
	$frameInstance = new \FML\Controls\FrameInstance();
	$maniaLink->add($frameInstance);
	$frameInstance->setModel($frameModel);
	$frameInstance->setX($i * 13);
}

// Print xml
$maniaLink->render(true);
