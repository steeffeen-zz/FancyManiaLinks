<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new FML\ManiaLink();

// Include another url
$include = new \FML\Elements\Including();
$manialink->add($include);
// TODO: include url
$include->setUrl('');

// Print xml
$manialink->render(true);
