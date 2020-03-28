<?php

$chart = new \Libchart\View\Chart\VerticalBarChart(800, 600);

$dataSetA = new \Libchart\Model\XYDataSet();
$dataSetA->addPoint(new \Libchart\Model\Point('2011', 1000));
$dataSetA->addPoint(new \Libchart\Model\Point('2012', 3000));
$dataSetA->addPoint(new \Libchart\Model\Point('2013', 7000));

$dataSetB = new \Libchart\Model\XYDataSet();
$dataSetB->addPoint(new \Libchart\Model\Point('2011', 1200));
$dataSetB->addPoint(new \Libchart\Model\Point('2012', 1300));
$dataSetB->addPoint(new \Libchart\Model\Point('2013', 1500));

$dataSet = new \Libchart\Model\XYSeriesDataSet();
$dataSet->addSerie("A", $dataSetA);
$dataSet->addSerie("B", $dataSetB);

$chart->setDataSet($dataSet);
$chart->setTitle("Example with XYSeriesDataSet");
$chart->render();

