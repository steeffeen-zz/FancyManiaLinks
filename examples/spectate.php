<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();
$script = $maniaLink->getScript();

// Create spectate button
$spectateQuad = new \FML\Controls\Quads\Quad_Icons128x128_1();
$maniaLink->add($spectateQuad);
$spectateQuad->setSize(30, 30);
$spectateQuad->setSubStyle($spectateQuad::SUBSTYLE_Profile);

// Set spectate link
$script->addSpectateButton($spectateQuad, 'PlayerLogin');

// Print xml
$maniaLink->render(true);
