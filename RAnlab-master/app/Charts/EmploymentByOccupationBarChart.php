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
        $category_0 = 0;
        $category_1 = 0;
        $category_2 = 0;
        $category_3 = 0;
        $category_4 = 0;
        $category_5 = 0;
        $category_6 = 0;
        $category_7 = 0;
        $category_8 = 0;
        $category_9 = 0;
        $labourData = Labour::where('CSDID', $regionId)->get();
        foreach ($labourData as $labour) {
            $category_0 = $labour->Legislative_and_senior_management_occupations;
            $category_1 = $labour->Business_finance_and_administration_occupations;
            $category_2 = $labour->Natural_and_applied_sciences_and_related_occupations;
            $category_3 = $labour->Health_occupations;
            $category_4 = $labour->Occupations_in_education_law_and_social;
            $category_5 = $labour->Occupations_in_art_culture_recreation_and_sport;
            $category_6 = $labour->Sales_and_service_occupations;
            $category_7 = $labour->Trades_transport_and_equipment_operators;
            $category_8 = $labour->Natural_resources_agriculture_and_related;
            $category_9 = $labour->Occupations_in_manufacturing_and_utilities;
        }
        $data = [$category_0, $category_1, $category_2, $category_3,
                $category_4, $category_5, $category_6, 
                $category_7, $category_8, $category_9];

        return $this->chart->barChart()
            ->setTitle('Employment by Occupation')
            ->addData('0 Legislative_and_senior_managemen',[$category_0])
            ->addData('1 Business, finance and administration',[$category_1])
            ->addData('2 Natural and applied sciences',[$category_2])
            ->addData('3 Health',[$category_3])
            ->addData('4 Education, law and social, community and government services',[$category_4])
            ->addData('5 Art, culture, recreation and sport',[$category_5])
            ->addData('6 Sales and service',[$category_6])
            ->addData('7 Trades, transport and equipment operators',[$category_7])
            ->addData('8 Natural resources, agriculture',[$category_8])
            ->addData('9 Manufacturing and utilities',[$category_9])
            ->setLabels(['Occupation']);
    }
}
