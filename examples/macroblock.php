<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create maniacode
$maniaCode = new FML\ManiaCode();

// Show a message
$maniaCode->addInstallMacroblock('Test Macroblock', 'Blocks/Storm/testmacroblock.Macroblock.Gbx', 'http://fml.steeffeen.com/media/testmacroblock.Macroblock.Gbx');

// Print xml
$maniaCode->render(true);
