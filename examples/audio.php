<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new FML\ManiaLink();

// Create audio element to play a sound
$audio = new \FML\Controls\Audio();
$manialink->add($audio);
$audio->setSize(40, 40);
// TODO: audio url
$audio->setData('');

// Print xml
$manialink->render(true);
