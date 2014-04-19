<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create profile button
$profileQuad = new \FML\Controls\Quads\Quad_Icons128x128_1();
$maniaLink->add($profileQuad);
$profileQuad->setSize(30, 30);
$profileQuad->setSubStyle($profileQuad::SUBSTYLE_Profile);
$profileQuad->addPlayerProfileFeature('PlayerLogin');

// Print xml
$maniaLink->render(true);
