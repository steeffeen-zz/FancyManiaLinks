<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Add some content
$quad = new \FML\Controls\Quads\Quad_ManiaPlanetLogos();
$quad->setSubStyle($quad::SUBSTYLE_ManiaPlanetLogoWhite);
$maniaLink->addChild($quad);

// Add the toggle interface feature using key name F9
$toggleInterfaceF9 = new \FML\Script\Features\ToggleInterface("F9");
$maniaLink->getScript()
          ->addFeature($toggleInterfaceF9);

// Print xml
echo $maniaLink;
