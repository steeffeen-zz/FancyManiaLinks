<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Include another url
$include = new \FML\Elements\Including();
$maniaLink->addChild($include);
$include->setUrl('http://fml.steeffeen.com/examples/included.php');

// Print xml
echo $maniaLink;
