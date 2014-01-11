<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new \FML\ManiaLink();
$script = $manialink->getScript();

// Create spectate button
$spectateQuad = new \FML\Controls\Quads\Quad_Icons128x128_1();
$manialink->add($spectateQuad);
$spectateQuad->setSize(30, 30);
$spectateQuad->setSubStyle($spectateQuad::SUBSTYLE_Profile);

// Set spectate link
$script->addSpectateButton($spectateQuad, 'login');

// Print xml
$manialink->render(true);
