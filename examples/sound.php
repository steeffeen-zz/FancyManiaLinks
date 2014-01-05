<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new FML\ManiaLink();
$script = $manialink->getScript();

// Create quad playing a sound on click
$soundQuad = new FML\Controls\Quads\Quad_Icons64x64_1();
$manialink->add($soundQuad);
$soundQuad->setSize(40, 40);
$soundQuad->setSubStyle($soundQuad::SUBSTYLE_ClipPlay);

// Add sound
$script->addSound($soundQuad, FML\Script\EUISound::SOUND_Capture);

// Print xml
$manialink->render(true);
