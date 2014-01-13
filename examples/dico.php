<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create label with textid
$label = new \FML\Controls\Label();
$maniaLink->add($label);

// Create dico with texts
$dico = new \FML\Elements\Dico();
$maniaLink->setDico($dico);

// TODO: complete example

// Print xml
$maniaLink->render(true);
