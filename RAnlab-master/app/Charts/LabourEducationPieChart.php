<?php

namespace App\Charts;

use App\Models\Labour;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Session;

class LabourEducationPieChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(int $regionId): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $NoEducation = 0;
        $HighSchool = 0;
        $College = 0;
        $labourData = Labour::where('CSDID', $regionId)->get();
        foreach ($labourData as $labour) {
            $NoEducation = $labour->No_certificate_diploma_or_degree;
            $HighSchool = $labour->High_school_diploma;
            $College = $labour->Bachelor_degree;
        }
        $data = [$NoEducation, $HighSchool, $College];

        return $this->chart->pieChart()
            ->setTitle('Education Level')
            ->addData($data)
            ->setLabels(['No Education', 'High School', "Bachelor's Degree"]);
    }
}
