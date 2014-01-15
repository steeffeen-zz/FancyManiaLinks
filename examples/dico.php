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

$dico->setEntry($dico::LANG_ENGLISH, 'hi', 'Hello!');
$dico->setEntry($dico::LANG_GERMAN, 'hi', 'Hallo!');
$dico->setEntry($dico::LANG_FRENCH, 'hi', 'Bonjour!');
$dico->setEntry($dico::LANG_SPANISH, 'hi', 'Hola!');
$dico->setEntry($dico::LANG_ITALIAN, 'hi', 'Ciao!');
$dico->setEntry($dico::LANG_PORTUGUESE, 'hi', 'Olá!');
$dico->setEntry($dico::LANG_HUNGARIAN, 'hi', 'Helló!');
$dico->setEntry($dico::LANG_DANISH, 'hi', 'Hej!');
$dico->setEntry($dico::LANG_RUSSIAN, 'hi', 'Алло!');

// Print xml
$maniaLink->render(true);
