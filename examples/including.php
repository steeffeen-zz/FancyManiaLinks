<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Include another url
$include = new \FML\Elements\Including();
$maniaLink->add($include);
$include->setUrl('http://fml.steeffeen.com/examples/included.php');

// Print xml
$maniaLink->render(true);
