<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Image Urls to preload
$imageUrls = array("http://fml.steeffeen.com/does_not_exist.jpg", "http://fml.steeffeen.com/i_wish_i_would_have_images.png");

// Create preload feature
$preload = new \FML\Script\Features\Preload();
$preload->setImageUrls($imageUrls);
$maniaLink->createScript()
          ->addFeature($preload);

// Print xml
echo $maniaLink;
