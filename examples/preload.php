<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create manialink
$maniaLink = new \FML\ManiaLink();

// Image Urls to preload
$imageUrls = array("http://fml.steeffeen.com/doesnt_exist.jpg", "http://fml.steeffeen.com/i_wish_i_would_have_images.png");

// Create preload feature
$preload = new \FML\Script\Features\Preload();
$preload->setImageUrls($imageUrls);
$maniaLink->getScript()->addFeature($preload);

// Print xml
$maniaLink->render(true);
