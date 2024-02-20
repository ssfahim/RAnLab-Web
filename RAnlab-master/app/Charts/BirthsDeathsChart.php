<?php

namespace App\Charts;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BirthsDeathsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($cityPopulation): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Extract population data from the $cityPopulation object
        $birthData = [$cityPopulation->Population_2016];
        $deathData = [$cityPopulation->Population_2021];

        return $this->chart->barChart()
            ->setTitle('Births and Deaths')
            ->addData("Births", $birthData)
            ->addData('Deaths', $deathData)
            ->setXAxis(['2016','2021']);
    }
}
