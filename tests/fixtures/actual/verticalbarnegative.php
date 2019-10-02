<?php

use Libchart\Model\Point;
use Libchart\Model\XYDataSet;
use Libchart\View\Chart\VerticalBarChart;

$chart = new VerticalBarChart();

$dataSet = new XYDataSet();
$dataSet->addPoint(new Point("2000", 780));
$dataSet->addPoint(new Point("2001", 200));
$dataSet->addPoint(new Point("2002", -100));
$dataSet->addPoint(new Point("2003", 0));
$dataSet->addPoint(new Point("2004", -550));
$dataSet->addPoint(new Point("2005", -300));
$chart->setDataSet($dataSet);

$chart->setTitle("Net migration");
$chart->render();
