<?php

namespace App\Http\Controllers;
use App\Models\Dashboard;
use App\Models\Business;
// use App\Charts\BirthsDeathsChart;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Session;

class DashboardController extends Controller
{

    public function index(Request $request, LarapexChart $chart){

        $regionId = Session::has('regionId') ? Session::get('regionId') : 91;
        $Population_2021 = 0;
        $Population_2016 = 0;
        $Population_percentage_change_2016_to_2021 = 0;

        if($regionId == 0){
            $regionId = 91;
            $cityData = Dashboard::where('CSDID', $regionId)->get();
            foreach ($cityData as $city) {
                $Population_2021 = $city->Population_2021;
                $Population_2016 = $city->Population_2016;
                $Population_percentage_change_2016_to_2021 = $city->Population_percentage_change_2016_to_2021;
            }
        }
        else {
            $cityData = Dashboard::where('CSDID', $regionId)->get();
            foreach ($cityData as $city) {
                $Population_2021 = $city->Population_2021;
                $Population_2016 = $city->Population_2016;
                $Population_percentage_change_2016_to_2021 = $city->Population_percentage_change_2016_to_2021;
            }
        }

        $businesses = Business::all();

        $data = Dashboard::all();
        $cities = Dashboard::distinct()->orderBy('CSDTxt')->pluck('CSDTxt');
        
        // $selectedCity = $request->input('city');
        $selectedCity = null;
        foreach ($cityData as $city) {
            $selectedCity = $city->CSDTxt;
        }
        if (!$selectedCity) {
            $selectedCity = "St. John's";
        }

        $cityPopulation = Dashboard::where('CSDTxt', $selectedCity)->first();

        // Check if city population data exists
        if ($cityPopulation) {
            $birthData = [$cityPopulation->Population_2016];
            $deathData = [$cityPopulation->Population_2021];
            // Build the chart
            $birthChart = $chart->barChart()
                // ->setTitle('Pupulation in 2016 v 2021')
                ->addData("2016", $birthData)
                ->addData('2021 ', $deathData)
                ->setXAxis(['Pupulation in 2016 v 2021']);
        } else {
            $birthChart = null;
        }

        return view('dashboard', 
            [   
                'data' => $data,
                'Population_percentage_change_2016_to_2021' => $Population_percentage_change_2016_to_2021,
                'Population_2016' => $Population_2016,
                'Population_2021' => $Population_2021,
                'cityData' => $cityData, 
                'selectedCity' => $selectedCity, 
                'birthChart'=> $birthChart,
                'businesses' => $businesses,
            ]);
    }
    
    // public function index(AgeGroupsChart $ageChart, PopulationChangeChart $popChart, BirthsDeathsChart $birthChart)
    // {
    //     $regionId = Session::has('regionId') ? Session::get('regionId')%3 : 0;

    //     return view('dashboard',
    //         [
    //             'ageChart' => $ageChart->build($regionId),
    //             'popChart' => $popChart->build($regionId),
    //             'birthChart' => $birthChart->build($regionId),
    //         ]);
    // }

    // public function dashboard(int $regionId, AgeGroupsChart $ageChart, PopulationChangeChart $popChart, BirthsDeathsChart $birthChart)
    // {
    //     return view('dashboard',
    //         [
    //             'ageChart' => $ageChart->build($regionId%3),
    //             'popChart' => $popChart->build($regionId%3),
    //             'birthChart' => $birthChart->build($regionId%3),
    //         ]);
    // }

    
}
