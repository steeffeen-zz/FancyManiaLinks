<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create value picker
$valuePicker = new \FML\Components\ValuePicker('TestValuePicker');
$maniaLink->add($valuePicker);
$valuePicker->setValues(array('Hydrogen', 'Helium', 'Lithium', 'Beryllium', 'Boron'));

// Print xml
$maniaLink->render(true);
