<?php

use Libchart\Model\XYDataSet;
use Libchart\View\Chart\VerticalBarChart;

$chart = new VerticalBarChart(500, 250);
$dataSet = new XYDataSet();
$chart->setDataSet($dataSet);

$chart->setTitle("User agents for www.example.com");
$chart->render();
