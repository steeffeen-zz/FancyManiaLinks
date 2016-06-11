<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create audio element to play a sound
$audio = new \FML\Controls\Audio();
$maniaLink->add($audio);
$audio->setSize(20, 20)
      ->setVolume(30)
      ->setData('http://fml.steeffeen.com/media/shoopdawhoop.ogg');

// Print xml
$maniaLink->render(true);
