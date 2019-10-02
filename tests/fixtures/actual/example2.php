<?php

use Libchart\Model\Point;
use Libchart\Model\XYDataSet;
use Libchart\View\Chart\HorizontalBarChart;
use Libchart\View\Primitive\Padding;

$chart = new HorizontalBarChart(500, 170);

$dataSet = new XYDataSet();
$dataSet->addPoint(new Point("/wiki/Instant_messenger", 50));
$dataSet->addPoint(new Point("/wiki/Web_Browser", 83));
$dataSet->addPoint(new Point("/wiki/World_Wide_Web", 142));
$chart->setDataSet($dataSet);

$chart->getPlot()->setGraphPadding(new Padding(5, 30, 20, 140));
$chart->setTitle("Most visited pages for www.example.com");
$chart->render();
