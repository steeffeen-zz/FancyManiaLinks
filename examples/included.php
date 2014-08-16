<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create dom document to render a single control
$domDocument = new \DOMDocument('1.0', 'utf-8');

// Create included controls
$label = new \FML\Controls\Label();
$label->setText("I'm included!");

// Print xml
$labelXmlElement = $label->render($domDocument);
$domDocument->appendChild($labelXmlElement);
echo $domDocument->saveXML();
