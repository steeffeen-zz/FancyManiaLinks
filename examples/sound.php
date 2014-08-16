<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create quad playing a sound on click
$soundQuad = new \FML\Controls\Quads\Quad_Icons64x64_1();
$maniaLink->add($soundQuad);
$soundQuad->setSize(40, 40);
$soundQuad->setSubStyle($soundQuad::SUBSTYLE_ClipPlay);
$soundQuad->addUISoundFeature(\FML\Script\Features\UISound::Capture);

// Print xml
$maniaLink->render(true);
