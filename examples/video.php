<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create video element to play a short animation
$video = new \FML\Controls\Video();
$maniaLink->addChild($video);
$video->setSize(100, 60)
      ->setData('http://fml.steeffeen.com/media/stylewalker.bik');

// Print xml
echo $maniaLink;
