<?php

use Libchart\Model\Point;
use Libchart\Model\XYDataSet;
use Libchart\View\Chart\PieChart;
use Libchart\View\Color\Color;

$chart = new PieChart();

$chart->getPlot()->getPalette()->setPieColor(
    [
        new Color(255, 0, 0),
        new Color(255, 255, 255),
    ]
);

$dataSet = new XYDataSet();
$dataSet->addPoint(new Point("Amanita abrupta", 80));
$dataSet->addPoint(new Point("Amanita arocheae", 75));
$dataSet->addPoint(new Point("Clitocybe dealbata", 50));
$dataSet->addPoint(new Point("Cortinarius rubellus", 70));
$dataSet->addPoint(new Point("Gyromitra esculenta", 37));
$dataSet->addPoint(new Point("Lepiota castanea", 37));
$chart->setDataSet($dataSet);

$chart->setTitle("Deadly mushrooms");
$chart->render();
