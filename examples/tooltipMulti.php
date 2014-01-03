<?php
use FML\Script\Script;

// Include FML
require_once __DIR__ . '/../FML/autoload.php';

// Create manialink
$manialink = new FML\ManiaLink();

// Create first quad
$firstQuad = new FML\Controls\Quads\Quad_Emblems();
$manialink->add($firstQuad);
$firstQuad->setPosition(-20, 10);
$firstQuad->setSize(20, 20);
$firstQuad->setSubStyle($firstQuad::SUBSTYLE_1);

// Create second quad
$secondQuad = new FML\Controls\Quads\Quad_Emblems();
$manialink->add($secondQuad);
$secondQuad->setPosition(20, 10);
$secondQuad->setSize(20, 20);
$secondQuad->setSubStyle($secondQuad::SUBSTYLE_2);

// Create the tooltip label
$tooltipLabel = new FML\Controls\Label();
$manialink->add($tooltipLabel);
$tooltipLabel->setY(-20);

// Create script
$script = new Script();
$manialink->setScript($script);

// Add tooltip label with different texts per quad
$script->addTooltip($firstQuad, $tooltipLabel, array(Script::OPTION_TOOLTIP_TEXT => "First Quad"));
$script->addTooltip($secondQuad, $tooltipLabel, array(Script::OPTION_TOOLTIP_TEXT => "Second Quad"));

// Print xml
$manialink->render(true);
