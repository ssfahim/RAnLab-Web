<?php

namespace App\Http\Controllers;
use App\Models\Dashboard;
use App\Models\Business;
use App\Models\AgeGender;
use App\Models\User;
// use App\Charts\BirthsDeathsChart;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Session;

class DashboardController extends Controller
{

    public function index(Request $request, LarapexChart $chart){


        
        // dd($ageGenderData);

        $regionId = Session::has('regionId') ? Session::get('regionId') : 91;

        $users = User::all();
        $emails = $users->pluck('email');
        // dd(auth()->user()->city);

        if(auth()->user()-> email === 'test@test.com'){
            $regionId = Session::has('regionId') ? Session::get('regionId') : 91;
        }
        else{
            $regionId = auth()->user()->city;
        }
        $ageGenderData = AgeGender::all();
        $regionData = null;
        $menData = 0;
        $womenData = 0;

        if($regionId == 0){
            $regionId = 91;
            $regionData = AgeGender::where('CSDID', $regionId)->get();
            // foreach($regionData as $city){
            //     $ageData = $city->Age_groups;
            //     $menData = $city->Men;
            //     $womenData = $city->Women;
            // }
        }
        else{
            $regionData = AgeGender::where('CSDID', $regionId)->get();
            // foreach($regionData as $city){
            //     $ageData = $city->Age_groups;
            //     $menData = $city->Men;
            //     $womenData = $city->Women;
            // }
        }

        // dd($regionId);
        $Population_2021 = 0;
        $Population_2016 = 0;
        $Population_percentage_change_2016_to_2021 = 0;
        $Total_private_dwellings= 0;
        $Private_dwellings_occupied_by_usual_residents = 0;
        $Private_dwellings_not_occupied_by_usual_residents = 0;
        $Age_distribution_0_to_14 = 0;
        $Age_distribution_15_to_64 = 0;
        $Age_distribution_65_years_and_over = 0;

        if($regionId == 0){
            $regionId = 91;
            $cityData = Dashboard::where('CSDID', $regionId)->get();
            foreach ($cityData as $city) {
                $Population_2021 = $city->Population_2021;
                $Population_2016 = $city->Population_2016;
                $Population_percentage_change_2016_to_2021 = $city->Population_percentage_change_2016_to_2021;
                $Total_private_dwellings = $city->Total_private_dwellings;
                $Private_dwellings_occupied_by_usual_residents = $city->Private_dwellings_occupied_by_usual_residents;
                $Private_dwellings_not_occupied_by_usual_residents = $city->Private_dwellings_not_occupied_by_usual_residents;
                $Age_distribution_0_to_14 = $city->Age_distribution_0_to_14;
                $Age_distribution_15_to_64 = $city->Age_distribution_15_to_64;
                $Age_distribution_65_years_and_over = $city->Age_distribution_65_years_and_over;
            }
        }
        else {
            $cityData = Dashboard::where('CSDID', $regionId)->get();
            foreach ($cityData as $city) {
                $Population_2021 = $city->Population_2021;
                $Population_2016 = $city->Population_2016;
                $Population_percentage_change_2016_to_2021 = $city->Population_percentage_change_2016_to_2021;
                $Total_private_dwellings = $city->Total_private_dwellings;
                $Private_dwellings_occupied_by_usual_residents = $city->Private_dwellings_occupied_by_usual_residents;
                $Private_dwellings_not_occupied_by_usual_residents = $city->Private_dwellings_not_occupied_by_usual_residents;
                $Age_distribution_0_to_14 = $city->Age_distribution_0_to_14;
                $Age_distribution_15_to_64 = $city->Age_distribution_15_to_64;
                $Age_distribution_65_years_and_over = $city->Age_distribution_65_years_and_over;
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
                // 'ageData' => $ageData,
                // 'menData' => $menData,
                // 'womenData' => $womenData,
                'regionData' => $regionData,
                'data' => $data,
                'Age_distribution_65_years_and_over' => $Age_distribution_65_years_and_over,
                'Age_distribution_15_to_64' => $Age_distribution_15_to_64,
                'Age_distribution_0_to_14' => $Age_distribution_0_to_14,
                'Private_dwellings_occupied_by_usual_residents' => $Private_dwellings_occupied_by_usual_residents,
                'Private_dwellings_not_occupied_by_usual_residents' => $Private_dwellings_not_occupied_by_usual_residents,
                'Total_private_dwellings' => $Total_private_dwellings,
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
