<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Static action via xml
$homeLabel = new \FML\Controls\Label();
$maniaLink->addChild($homeLabel);
$homeLabel->setX(-10)
          ->setText('Home')
          ->setAction(\FML\Types\Actionable::ACTION_HOME);

// Dynamic action via script
$enterLabel = new \FML\Controls\Label();
$maniaLink->addChild($enterLabel);
$enterLabel->setX(10)
           ->setText('Quit')
           ->addActionTriggerFeature(\FML\Types\Actionable::ACTION_QUIT);

// Print xml
echo $maniaLink;
