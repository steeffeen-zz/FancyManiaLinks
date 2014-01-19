<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Include another url
$include = new \FML\Elements\Including();
$maniaLink->add($include);
$includeUrl = dirname($_SERVER['SCRIPT_URI']) . '/included.php';
$include->setUrl($includeUrl);

// Print xml
$maniaLink->render(true);
