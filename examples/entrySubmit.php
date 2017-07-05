<?php

// Include FML
require_once __DIR__ . "/../autoload.php";

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create entry element to allow input
$entry = new \FML\Controls\Entry();
$maniaLink->addChild($entry);
$entry->setSize(50, 7)
      ->setName("input")
      ->setAutoComplete(true);

// Add submit feature
$entry->addSubmitFeature("fancyml?entrysubmit");

// Display input if any is given
if (!empty($_GET["input"])) {
    $outputLabel = new \FML\Controls\Label();
    $maniaLink->addChild($outputLabel);
    $outputLabel->setY(-30)
                ->setText("Your Input: '{$_GET['input']}'");
}

// Print xml
echo $maniaLink;
