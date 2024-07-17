<?php

namespace App\Charts;

use App\Models\Dashboard;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Session;

class AgeCharacterChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(int $regionId): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $ageData = Dashboard::where('CSDID', $regionId)->get();
        $age1 = 0;
        $age2 = 0;
        foreach ($ageData as $age) {
            $age1 = $age->Age_distribution_0_to_14;
            $age2 = $age->Age_distribution_15_to_64;
            $age3 = $age->Age_distribution_65_years_and_over;
        }
        
        return $this->chart->pieChart()
            // ->setTitle('Passing effectiveness.')
            // ->setSubtitle('Barcelona city vs Madrid sports.')
            ->addData([$age1,$age2,$age3])
            ->setLabels(['Age: 0 to 14', 'Age: 15 to 64', 'Age: 65 and Over'])
            // ->setColors(['#D32F2F', '#03A9F4'])
            ->setDataLabels(true);
    }
}
