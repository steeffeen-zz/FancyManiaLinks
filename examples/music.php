<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new FML\ManiaLink();

// Create music element to play background music
$music = new \FML\Elements\Music();
$maniaLink->add($music);
// TODO: music url
$music->setData('');

// Print xml
$maniaLink->render(true);
