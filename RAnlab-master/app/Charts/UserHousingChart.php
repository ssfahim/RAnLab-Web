<?php

namespace App\Charts;

use App\Models\Housing;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Session;

class UserHousingChart
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
        $city = null;
        $housingData = Housing::where('CSDID', auth()->user()->city)->get();
        foreach ($housingData as $housing) {
            $Owner = $housing->Owner;
            $Renter = $housing->Renter;
            $city = $housing->CSDTxt;
        }
        $data = [$Owner, $Renter];

        // dd($regionId);


        return $this->chart->pieChart()
            ->setTitle('Household Tenure in ' . $city)
            ->addData($data)
            ->setLabels(['Owner', 'Renter'])
            // ->setLabelsInside(true)
            ->setDataLabels(true);
    }
}
