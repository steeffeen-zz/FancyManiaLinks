<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaCode
$maniaCode = new \FML\ManiaCode();

// Show a message
$maniaCode->addShowMessage('FML rules!');

// Print xml
echo $maniaCode;
