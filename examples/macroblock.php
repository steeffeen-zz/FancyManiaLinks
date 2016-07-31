<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaCode
$maniaCode = new FML\ManiaCode();

// Show a message
$maniaCode->addInstallMacroblock('Test Macroblock', 'Blocks/Storm/testmacroblock.Macroblock.Gbx',
    'http://fml.steeffeen.com/media/testmacroblock.Macroblock.Gbx');

// Print xml
echo $maniaLink;
