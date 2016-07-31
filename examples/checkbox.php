<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create checkbox
$checkBox = new \FML\Components\CheckBox('TestCheckBox');
$maniaLink->addChild($checkBox);

// Print xml
echo $maniaLink;
