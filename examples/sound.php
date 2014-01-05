<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new FML\ManiaLink();

// Create quad playing a sound on click
$soundQuad = new FML\Controls\Quads\Quad_Icons64x64_1();
$manialink->add($soundQuad);
$soundQuad->setSize(40, 40);
$soundQuad->setSubStyle($soundQuad::SUBSTYLE_ClipPlay);

// Create sound variant
$script = $manialink->getScript();
$sound = new FML\Script\UISound(FML\Script\UISound::SOUND_Finish);
$script->addSound($soundQuad, $sound);

// Print xml
$manialink->render(true);
