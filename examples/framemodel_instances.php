<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create frame model containing elements
$frameModel = new \FML\Elements\FrameModel();
$maniaLink->addChild($frameModel);
$frameModel->setId('MyFrameModel');

$label = new \FML\Controls\Label();
$frameModel->addChild($label);
$label->setText('Neat!');

$quad = new \FML\Controls\Quads\Quad_Copilot();
$frameModel->addChild($quad);
$quad->setY(-10)
     ->setSize(10, 10)
     ->setSubStyle($quad::SUBSTYLE_UpGood);

$quad = new \FML\Controls\Quads\Quad_Copilot();
$frameModel->addChild($quad);
$quad->setY(10)
     ->setSize(10, 10)
     ->setSubStyle($quad::SUBSTYLE_Down);

// Create frame instances at various positions
for ($i = -5; $i <= 5; $i++) {
    $frameInstance = new \FML\Controls\FrameInstance();
    $maniaLink->addChild($frameInstance);
    $frameInstance->setModel($frameModel)
                  ->setX($i * 13);
}

// Print xml
echo $maniaLink;
