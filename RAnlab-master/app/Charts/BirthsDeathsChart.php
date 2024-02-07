<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class BirthsDeathsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($regionId): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $birthData = [];
        $deathData = [];

        switch ($regionId) {
            case 1:
                $birthData = [1040, 1090, 980, 970, 915, 910, 960];
                $deathData = [1130, 1045, 1080, 1115, 1095, 1175, 1270];
                break;
            case 2:
                $birthData = [123, 456, 798];
                $deathData = [123, 456, 798];
                break;
            case 3:
                $birthData = [12, 34, 56];
                $deathData = [12, 34, 56];
                break;
            default:
                $birthData = [1040, 1090, 980, 970, 915, 910, 960];
                $deathData = [1130, 1045, 1080, 1115, 1095, 1175, 1270];
                break;
        }

        return $this->chart->barChart()
            ->setTitle('Births and Deaths')
            ->addData("Births", $birthData)
            ->addData('Deaths', $deathData)
            ->setXAxis(['2015', '2016', '2017', '2018', '2019', '2020', '2021']);
    }
}
