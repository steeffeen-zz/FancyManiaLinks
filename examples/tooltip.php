<?php

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new FML\ManiaLink();

// Create quad for which a tooltip will be shown
$quad = new FML\Controls\Quad();
$manialink->add($quad);

// Create the tooltip quad
$tooltipQuad = new FML\Controls\Quad();
$manialink->add($tooltipQuad);

// Create script
$script = new FML\Script\Script();
$manialink->setScript($script);

// Create tooltip
$tooltips = new FML\Script\Tooltips();
$script->addFeature($tooltips);
$tooltips->add($quad, $tooltipQuad);

// Print xml
$manialink->render(true);

?>
