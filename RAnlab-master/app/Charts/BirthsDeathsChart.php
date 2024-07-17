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

    public function build(int $regionId): \ArielMejiaDev\LarapexCharts\BarChart
{
    // Initialize variables and retrieve labour data
    $labourData = Labour::where('CSDID', $regionId)->first();

    // Extract data for each category
    $category_0 = $labourData->Legislative_and_senior_management_occupations;
    $category_1 = $labourData->Business_finance_and_administration_occupations;
    $category_2 = $labourData->Natural_and_applied_sciences_and_related_occupations;
    $category_3 = $labourData->Health_occupations;
    $category_4 = $labourData->Occupations_in_education_law_and_social;
    $category_5 = $labourData->Occupations_in_art_culture_recreation_and_sport;
    $category_6 = $labourData->Sales_and_service_occupations;
    $category_7 = $labourData->Trades_transport_and_equipment_operators;
    $category_8 = $labourData->Natural_resources_agriculture_and_related;
    $category_9 = $labourData->Occupations_in_manufacturing_and_utilities;

    // Create a bar chart
    return $this->chart->barChart()
        ->setTitle('Employment by Occupation')
        ->addData('Legislative_and_senior_management', [$category_0])
        ->addData('Business, finance and administration', [$category_1])
        ->addData('Natural and applied sciences', [$category_2])
        ->addData('Health', [$category_3])
        ->addData('Education, law and social', [$category_4])
        ->addData('Art, culture, recreation and sport', [$category_5])
        ->addData('Sales and service', [$category_6])
        ->addData('Trades, transport and equipment operators', [$category_7])
        ->addData('Natural resources, agriculture', [$category_8])
        ->addData('Manufacturing and utilities', [$category_9])
        ->setXAxis([
            'Legislative', 
            'Business', 
            'Natural Sciences', 
            'Health', 
            'Education', 
            'Art', 
            'Sales', 
            'Trades', 
            'Natural Resources', 
            'Manufacturing'
        ])
        ->setDataLabels(true); // Adjust spacing between bars
}
}
