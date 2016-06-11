<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create profile button
$profileQuad = new \FML\Controls\Quads\Quad_Icons128x128_1();
$maniaLink->add($profileQuad);
$profileQuad->setSize(30, 30)
            ->setSubStyle($profileQuad::SUBSTYLE_Profile)
            ->addPlayerProfileFeature('PlayerLogin');

// Print xml
$maniaLink->render(true);
