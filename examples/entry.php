<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create entry element to allow input
$entry = new \FML\Controls\Entry();
$maniaLink->add($entry);
$entry->setSize(50, 7)
      ->setName('input');

// Add submit button
$submitButton = new \FML\Controls\Quads\Quad_Icons64x64_1();
$maniaLink->add($submitButton);
$submitButton->setSize(10, 10)
             ->setX(40)
             ->setSubStyle($submitButton::SUBSTYLE_Outbox)
             ->setManialink('fancyml?entry&input=input');

// Display input if any is given
if (!empty($_GET['input'])) {
    $outputLabel = new \FML\Controls\Label();
    $maniaLink->add($outputLabel);
    $outputLabel->setY(-30)
                ->setText("Your Input: '{$_GET['input']}'");
}

// Print xml
$maniaLink->render(true);
