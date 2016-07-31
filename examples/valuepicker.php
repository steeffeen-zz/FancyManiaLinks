<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create value picker
$valuePicker = new \FML\Components\ValuePicker('TestValuePicker');
$maniaLink->addChild($valuePicker);
$valuePicker->setValues(array('Hydrogen', 'Helium', 'Lithium', 'Beryllium', 'Boron'));

// Print xml
echo $maniaLink;
