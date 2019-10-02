<?php

use Libchart\Model\Point;
use Libchart\Model\XYDataSet;
use Libchart\View\Chart\LineChart;

$chart = new LineChart();

$dataSet = new XYDataSet();
$dataSet->addPoint(new Point("06-01", 0));
$dataSet->addPoint(new Point("06-02", 0));
$chart->setDataSet($dataSet);

$chart->setTitle("Sales for 2006");
$chart->render();
