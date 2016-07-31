<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create music element to play background music
$music = new \FML\Elements\Music();
$maniaLink->addChild($music);
$music->setData('http://fml.steeffeen.com/media/cantinabar.ogg');

// Print xml
echo $maniaLink;
