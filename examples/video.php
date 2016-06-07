<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create video element to play a short animation
$video = new \FML\Controls\Video();
$maniaLink->add($video);
$video->setSize(100, 60);
$video->setData('http://fml.steeffeen.com/media/stylewalker.bik');

// Print xml
$maniaLink->render(true);
