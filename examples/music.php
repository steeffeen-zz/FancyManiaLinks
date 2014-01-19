<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create music element to play background music
$music = new \FML\Elements\Music();
$maniaLink->add($music);
$music->setData('http://fml.steeffeen.com/media/cantinabar.ogg');

// Print xml
$maniaLink->render(true);
