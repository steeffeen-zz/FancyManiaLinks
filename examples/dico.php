<?php
// TODO: validate example
// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Create label with textid
$label = new \FML\Controls\Label();
$maniaLink->add($label);
$label->setTextId('hi');

// Create dico with translated texts
$dico = $maniaLink->getDico();

$dico->setEntry($dico::LANG_EN, 'hi', 'Hello!');
$dico->setEntry($dico::LANG_DE, 'hi', 'Hallo!');
$dico->setEntry($dico::LANG_FR, 'hi', 'Bonjour!');
$dico->setEntry($dico::LANG_ES, 'hi', 'Hola!');
$dico->setEntry($dico::LANG_IT, 'hi', 'Ciao!');
$dico->setEntry($dico::LANG_PT, 'hi', 'Olá!');
$dico->setEntry($dico::LANG_HU, 'hi', 'Helló!');
$dico->setEntry($dico::LANG_DA, 'hi', 'Hej!');
$dico->setEntry($dico::LANG_RU, 'hi', 'Алло!');

// Print xml
$maniaLink->render(true);
