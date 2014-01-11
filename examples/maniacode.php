<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create maniacode
$maniaCode = new FML\ManiaCode();

// Show a message
$maniaCode->addShowMessage('FML rules!');

// Print xml
$maniaCode->render(true);
