<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Label element showing the current time
$timeLabel = new \FML\Controls\Label("Label_Time");
$maniaLink->addChild($timeLabel);

// Create script using template file
$parameters = array("LabelId" => "Label_Time", "LabelValue" => "CurrentLocalDateText");
$script     = new \FML\Elements\TemplateScript(__DIR__ . "/templatescript.txt", $parameters);
$maniaLink->addChild($script);

// Print xml
echo $maniaLink;
