<?php
    $chart = new \Libchart\View\Chart\HorizontalBarChart(500, 250);
    $dataSet = new \Libchart\Model\XYDataSet();
    $chart->setDataSet($dataSet);

    $chart->setTitle("User agents for www.example.com");
    $chart->render();