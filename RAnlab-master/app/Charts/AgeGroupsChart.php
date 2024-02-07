<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class AgeGroupsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(int $regionId): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $data = [];

        switch ($regionId) {
            case 0:
                $data = [31250, 140660, 25055];
                break;
            case 1:
                $data = [123, 456, 798];
                break;
            case 2:
                $data = [12, 34, 56];
                break;
            default:
                $data = [31250, 140660, 25055];
                break;
        }

        return $this->chart->pieChart()
            ->setTitle('Age Groups')
            ->addData($data)
            ->setLabels(['0 to 14', '15 to 64', '64 and Up']);
    }
}
