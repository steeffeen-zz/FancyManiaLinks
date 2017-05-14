<?php

// Include FML
require_once __DIR__ . '/../autoload.php';

// Create ManiaLink
$maniaLink = new \FML\ManiaLink();

// Create graph element
$graph = new \FML\Controls\Graph();
$graph->getSettings()
      ->setMinimumCoordinates(array(0., 0.))
      ->setMaximumCoordinates(array(3., 3.));
$maniaLink->addChild($graph);

// Create curves
$graphCurve1 = new \FML\Script\Features\GraphCurve();
$graphCurve1->setColor(array(1., 0., 0.));
$graphCurve1->setPoints(array(
    array(0., 0.),
    array(1., 1.),
    array(2., 2.),
    array(3., 3.)
));
$graph->addCurve($graphCurve1);

$graphCurve2 = new \FML\Script\Features\GraphCurve();
$graphCurve2->setColor(array(0., 1., 0.));
$graphCurve2->setPoints(array(
    array(0., 1.),
    array(1., 2.),
    array(2., 0.),
    array(3., 1.)
));
$graph->addCurve($graphCurve2);

$graphCurve3 = new \FML\Script\Features\GraphCurve();
$graphCurve3->setColor(array(0., 0., 1.));
$graphCurve3->setPoints(array(
    array(0., 3.),
    array(1., 2.),
    array(2., 1.),
    array(3., 0.)
));
$graph->addCurve($graphCurve3);

// Print xml
echo $maniaLink;
