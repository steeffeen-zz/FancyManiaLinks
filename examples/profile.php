<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new \FML\ManiaLink();
$script = $manialink->getScript();

// Create profile button
$profileQuad = new \FML\Controls\Quads\Quad_Icons128x128_1();
$manialink->add($profileQuad);
$profileQuad->setSize(30, 30);
$profileQuad->setSubStyle($profileQuad::SUBSTYLE_Profile);

// Set profile link
$script->addProfileButton($profileQuad, 'PlayerLogin');

// Print xml
$manialink->render(true);
