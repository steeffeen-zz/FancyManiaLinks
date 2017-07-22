<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Add main frame
$mainFrame = new \FML\Controls\Frame();
$maniaLink->addChild($mainFrame);

// Add some content
$quad = new \FML\Controls\Quads\Quad_ManiaPlanetLogos();
$quad->setSubStyle($quad::SUBSTYLE_ManiaPlanetLogoWhite);
$mainFrame->addChild($quad);

// Add the toggle interface feature using main frame and key name F9
$toggleInterfaceF9 = new \FML\Script\Features\ToggleInterface($mainFrame, "F9");
$maniaLink->getScript()
          ->addFeature($toggleInterfaceF9);

// Print xml
echo $maniaLink;
