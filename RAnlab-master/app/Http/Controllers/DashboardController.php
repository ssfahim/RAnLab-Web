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
        $businesses = Business::all();

        $data = Dashboard::all();
        // dd($data);
        $cities = Dashboard::distinct()->orderBy('CSDTxt')->pluck('CSDTxt');
        
        $selectedCity = $request->input('city');
        // // dd($selectedCity);
        
        $cityData = null;
    
        if ($selectedCity) {
            $cityData = Dashboard::where('CSDTxt', $selectedCity)->get();
        }

        // $selectedCity = $request->input('city');

        // If no city is selected, default to "Deer Lake"
        if (!$selectedCity) {
            $selectedCity = "Deer Lake";
        }

        // Retrieve all cities from the database
        // $cities = Dashboard::distinct()->orderBy('CSDTxt')->pluck('CSDTxt');

        // Set the selected city name for testing
        $selected = $request->input('city');

        // Fetch city population data based on the selected city name
        $cityPopulation = Dashboard::where('CSDTxt', $selected)->first();

        // Check if city population data exists
        if ($cityPopulation) {
            // Extract population data from the $cityPopulation object
            $birthData = [$cityPopulation->Population_2016];
            $deathData = [$cityPopulation->Population_2021];
            // dd($cityPopulation->Population_2016);
            // Build the chart
            $birthChart = $chart->barChart()
                // ->setTitle('Pupulation in 2016 v 2021')
                ->addData("2016", $birthData)
                ->addData('2021 ', $deathData)
                ->setXAxis(['Pupulation in 2016 v 2021']);

            // dd($birthChart);
        } else {
            // Handle case where city population data is not found
            // For now, let's just set the chart to null
            $birthChart = null;
        }

        return view('dashboard', 
            [   'data' => $data,
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
