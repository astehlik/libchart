<?php

use Libchart\Model\XYDataSet;
use Libchart\View\Chart\HorizontalBarChart;

$chart = new HorizontalBarChart(500, 250);
$dataSet = new XYDataSet();
$chart->setDataSet($dataSet);

$chart->setTitle("User agents for www.example.com");
$chart->render();
