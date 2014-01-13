<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Include another url
$include = new \FML\Elements\Including();
$maniaLink->add($include);
// TODO: include url
$include->setUrl('');

// Print xml
$maniaLink->render(true);
