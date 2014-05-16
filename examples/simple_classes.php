<?php

// Enable simple FML classes
define('FML_SIMPLE_CLASSES', true);

require_once __DIR__ . '/../FML/autoload.php';

// You can use the class names directly without the namespace if they aren't used already

// Instead of: $maniaLink = new FML\ManiaLink();
$maniaLink = new ManiaLink();

// You can also use the simple namespace FML\ without having to give the full namespace

// Instead of: $label = new FML\Controls\Labels\Label_Text();
$label = new FML\Label_Text();
$maniaLink->add($label);
$label->setText('Easy Label.');

// Print xml
$maniaLink->render(true);
