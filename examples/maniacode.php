<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create maniacode
$maniaCode = new \FML\ManiaCode();

// Show a message
$maniaCode->addShowMessage('FML rules!');

// Print xml
$maniaCode->render(true);
