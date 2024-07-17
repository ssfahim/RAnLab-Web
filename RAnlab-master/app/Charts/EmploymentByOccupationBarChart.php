<?php

namespace App\Charts;

use App\Models\Labour;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Session;

class EmploymentByOccupationBarChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(int $regionId): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $labourData = Labour::where('CSDID', $regionId)->first();

        $categoryData = [
            'Legislative and senior management' => $labourData->Legislative_and_senior_management_occupations,
            'Business, finance and administration' => $labourData->Business_finance_and_administration_occupations,
            'Natural and applied sciences' => $labourData->Natural_and_applied_sciences_and_related_occupations,
            'Health' => $labourData->Health_occupations,
            'Education, law and social' => $labourData->Occupations_in_education_law_and_social,
            'Art, culture, recreation and sport' => $labourData->Occupations_in_art_culture_recreation_and_sport,
            'Sales and service' => $labourData->Sales_and_service_occupations,
            'Trades, transport and equipment operators' => $labourData->Trades_transport_and_equipment_operators,
            'Natural resources, agriculture' => $labourData->Natural_resources_agriculture_and_related,
            'Manufacturing and utilities' => $labourData->Occupations_in_manufacturing_and_utilities,
        ];

        $seriesData = [];
        foreach ($categoryData as $category => $value) {
            $seriesData[] = $value;
        }

        $laboursData = Labour::where('CSDID', $regionId)->get();
        $city = null;
        foreach ($laboursData as $labour) {;
            $city = $labour->CSDTxt;
        }

        $xAxisLabels = array_keys($categoryData);

        return $this->chart->barChart()
            ->setTitle('Employment by Occupation in ' . $city)
            ->setXAxis($xAxisLabels)
            ->addData('Data', $seriesData)
            ->setDataLabels(true);
    }


}
