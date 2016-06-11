<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create customUI
$customUI = new \FML\CustomUI();

// Disable various display settings
$customUI->setChallengeInfoVisible(false)
         ->setCheckpointListVisible(false)
         ->setRoundScoresVisible(false);

// Print xml
echo $customUI;
