<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new FML\ManiaLink();

// Create video element to play a short animation
$video = new \FML\Controls\Video();
$maniaLink->add($video);
$video->setSize(100, 60);
// TODO: video url
$video->setData('');

// Print xml
$maniaLink->render(true);
