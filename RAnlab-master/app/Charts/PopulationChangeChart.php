<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PopulationChangeChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($regionId): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $data = [];

        switch ($regionId) {
            case 1:
                $data = [109685, 111288, 111663, 112039];
                break;
            case 2:
                $data = [123, 456, 798];
                break;
            case 3:
                $data = [12, 34, 56];
                break;
            default:
                $data = [109685, 111288, 111663, 112039];
                break;
        }

        return $this->chart->lineChart()
            ->setTitle('Population Change')
            ->addData('Population', $data)
            ->setXAxis(['2012', '2017', '2020', '2023']);
    }
}
