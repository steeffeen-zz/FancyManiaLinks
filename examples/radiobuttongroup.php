<?php

error_reporting(E_ALL);

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create radio buttons
$radioButton1 = new \FML\Components\CheckBox('RadioButton1');
$radioButton1->getQuad()
             ->setX(-20);
$maniaLink->addChild($radioButton1);

$radioButton2 = new \FML\Components\CheckBox('RadioButton2');
$maniaLink->addChild($radioButton2);

$radioButton3 = new \FML\Components\CheckBox('RadioButton3');
$radioButton3->getQuad()
             ->setX(20);
$maniaLink->addChild($radioButton3);

// Create radio button group
$radioButtonGroup = new \FML\Components\RadioButtonGroup('RadioButtonGroup');
$radioButtonGroup->addRadioButtons(array($radioButton1, $radioButton2, $radioButton3));
$maniaLink->addChild($radioButtonGroup);

// Print xml
echo $maniaLink;
