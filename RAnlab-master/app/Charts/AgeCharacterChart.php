<?php

namespace App\Charts;

use App\Models\Dashboard;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Session;

class AgeCharacterChart extends LarapexChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(int $regionId): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        $ageData = Dashboard::where('CSDID', $regionId)->get();
        $age1 = 0;
        $age2 = 0;
        foreach ($ageData as $age) {
            $age1 = $age->Age_distribution_0_to_14;
            $age2 = $age->Age_distribution_15_to_64;
        }
        
        return $this->chart->radialChart()
            ->setTitle('Passing effectiveness.')
            ->setSubtitle('Barcelona city vs Madrid sports.')
            ->addData([$age1,$age2])
            ->setLabels(['Barcelona city', 'Madrid sports'])
            ->setColors(['#D32F2F', '#03A9F4']);
    }
}
