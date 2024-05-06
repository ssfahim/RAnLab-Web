<?php

namespace App\Charts;

use App\Models\Housing;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Session;

class AgeGroupsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(int $regionId): \ArielMejiaDev\LarapexCharts\PieChart
    {
        // AgeGender::where('CSDID', $regionId)->get();
        // $regionId = Session::has('regionId') ? Session::get('regionId') : 91;
        $Owner = 0;
        $Renter = 0;
        $housingData = Housing::where('CSDID', $regionId)->get();
        foreach ($housingData as $housing) {
            $Owner = $housing->Owner;
            $Renter = $housing->Renter;
        }
        $data = [$Owner, $Renter];

        // dd($regionId);


        return $this->chart->pieChart()
            ->setTitle('Household Tenure')
            ->addData($data)
            ->setLabels(['Owner', 'Renter']);
    }
}
