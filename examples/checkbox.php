<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create checkbox
$checkBox = new \FML\Components\CheckBox('TestCheckBox');
$maniaLink->add($checkBox);

// Print xml
$maniaLink->render(true);
