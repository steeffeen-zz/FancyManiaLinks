<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create checkbox
$checkBox = new \FML\Components\CheckBox('TestCheckBox');
$maniaLink->add($checkBox);

// Print xml
$maniaLink->render(true);
