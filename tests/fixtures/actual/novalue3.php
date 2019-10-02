<?php

use Libchart\View\Chart\LineChart;

$chart = new LineChart();

//$chart->addPoint(new \Libchart\Model\Point("06-01", 0));
//$chart->addPoint(new \Libchart\Model\Point("06-02", 10));

$chart->setTitle("Sales for 2006");
$chart->render();

