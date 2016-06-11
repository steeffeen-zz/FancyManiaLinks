<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create label with textid
$label = new \FML\Controls\Label();
$maniaLink->add($label);
$label->setTextId('hi');

// Create dico with translated texts
$dico = $maniaLink->getDico();

$dico->setEntry($dico::LANG_ENGLISH, 'hi', 'Hello!')
     ->setEntry($dico::LANG_GERMAN, 'hi', 'Hallo!')
     ->setEntry($dico::LANG_FRENCH, 'hi', 'Bonjour!')
     ->setEntry($dico::LANG_SPANISH, 'hi', 'Hola!')
     ->setEntry($dico::LANG_ITALIAN, 'hi', 'Ciao!')
     ->setEntry($dico::LANG_PORTUGUESE, 'hi', 'Olá!')
     ->setEntry($dico::LANG_HUNGARIAN, 'hi', 'Helló!')
     ->setEntry($dico::LANG_DANISH, 'hi', 'Hej!')
     ->setEntry($dico::LANG_RUSSIAN, 'hi', 'Алло!');

// Print xml
$maniaLink->render(true);
