<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Business;
use App\Models\Demography;
use App\Models\HousingReviewRequest;
use App\Models\Category;
use App\Models\Dashboard;
use App\Models\Labour;
use App\Models\HousingReview;
use App\Models\AgeGender;
use App\Models\Housing;
use App\Charts\AgeGroupsChart;
use App\Charts\UserHousingChart;
use App\Charts\AgeCharacterChart;
use App\Charts\UserAgeCharacterChart;
use App\Charts\LabourEducationPieChart;
use App\Charts\UserLabourEducationPieChart;
use App\Charts\EmploymentByOccupationBarChart;
use App\Charts\UserEmploymentByOccupationBarChart;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Auth;
use Date;
use Session;

class DashboardController extends Controller
{

    public function index(Request $request, LarapexChart $chart, 
        AgeGroupsChart $ageChart, // Here ageChart has Housing data
        LabourEducationPieChart $labourEducation, 
        EmploymentByOccupationBarChart $EmploymentByOccupationBarChart, 
        AgeCharacterChart $AgeCharacterChart,
        UserAgeCharacterChart $UserAgeCharacterChart,
        UserHousingChart $UserHousingChart,
        UserLabourEducationPieChart $UserLabourEducationPieChart,
        UserEmploymentByOccupationBarChart $UserEmploymentByOccupationBarChart){
        $regionId = Session::has('regionId') ? Session::get('regionId') : auth()->user()->city;

        $regionMap = [
            304 => 'BaieVerte',
            331 => 'BirdCove',
            208 => 'BishopsFalls',
            210 => 'Botwood',
            315 => 'Conche',
            188 => 'CornerBrook',
            192 => 'CoxsCove',
            175 => 'DeerLake',
            330 => 'FlowersCove',
            207 => 'GFW',
            185 => 'Gillams',
            195 => 'HughesBrook',
            190 => 'HumberArmSouth',
            360 => 'HVGB',
            196 => 'IrishtownSummerside',
            362 => 'LabCity',
            193 => 'LarkHarbour',
            332 => 'MainBrook',
            187 => 'MasseyDrive',
            191 => 'McIvers',
            194 => 'Meadows',
            197 => 'MountMoriah',
            183 => 'Pasadena',
            209 => 'Peterview',
            314 => 'RoddicktonBA',
            287 => 'Springdale',
            333 => 'StAnthony',
            182 => 'SteadyBrook',
            336 => 'StLunaireGriquet',
            // 91 => 'StJohns',
            363 => 'Wabush',
            198 => 'YorkHarbour',
        ];
        $showSpecificPart  = true;
        // $pdf = PDF::loadView('pages.newblade', compact('printthis'));

        $users = User::all();
        $emails = $users->pluck('email');

        if(auth()->user()-> email === 'test@test.com'){
            $regionId = Session::has('regionId') ? Session::get('regionId') : 91;
            $pdfFileName = $regionMap[$regionId] ?? $regionMap[188];
        }
        else{
            $regionId = auth()->user()->city;
            $pdfFileName = $regionMap[$regionId] ?? null;
        }
        if(request()->has('download_pdf')) {
            if ($pdfFileName === null) {
                return response()->json(['message' => 'Your data is not available at the moment!'], 200);
                // return redirect()->back()->with('message', 'Your data is not available at the moment!');
            }
        }
        $ageGenderData = AgeGender::all();
        $regionData = null;
        $menData = 0;
        $womenData = 0;

        if($regionId == 0){
            $regionId = 91;
            $regionData = AgeGender::where('CSDID', auth()->user()->city)->get();
            // foreach($regionData as $city){
            //     $ageData = $city->Age_groups;
            //     $menData = $city->Men;
            //     $womenData = $city->Women;
            // }
        }
        else{
            $regionData = AgeGender::where('CSDID', auth()->user()->city)->get();
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
        $City = null;

        $UserPopulation_2021 = 0;
        $UserPopulation_2016 = 0;
        $UserPopulation_percentage_change_2016_to_2021 = 0;
        $UserTotal_private_dwellings= 0;
        $UserPrivate_dwellings_occupied_by_usual_residents = 0;
        $UserPrivate_dwellings_not_occupied_by_usual_residents = 0;
        $UserAge_distribution_0_to_14 = 0;
        $UserAge_distribution_15_to_64 = 0;
        $UserAge_distribution_65_years_and_over = 0;

        $UsercityData = Dashboard::where('CSDID', auth()->user()->city)->get();
        $UserCity = null;
        foreach ($UsercityData as $city) {
            $UserPopulation_2021 = $city->Population_2021;
            $UserPopulation_2016 = $city->Population_2016;
            $UserPopulation_percentage_change_2016_to_2021 = $city->Population_percentage_change_2016_to_2021;
            $UserTotal_private_dwellings = $city->Total_private_dwellings;
            $UserPrivate_dwellings_occupied_by_usual_residents = $city->Private_dwellings_occupied_by_usual_residents;
            $UserPrivate_dwellings_not_occupied_by_usual_residents = $city->Private_dwellings_not_occupied_by_usual_residents;
            $UserAge_distribution_0_to_14 = $city->Age_distribution_0_to_14;
            $UserAge_distribution_15_to_64 = $city->Age_distribution_15_to_64;
            $UserAge_distribution_65_years_and_over = $city->Age_distribution_65_years_and_over;
            $UserCity = $city -> CSDTxt;
        }

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
                $City = $city -> CSDTxt;
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
                $City = $city -> CSDTxt;
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
        // dd($regionId);

        return view('dashboard', 
            [   
                // 'ageData' => $ageData,
                // 'menData' => $menData,
                // 'womenData' => $womenData,
                'showSpecificPart' => $showSpecificPart,
                'pdfFileName' => $pdfFileName,
                'AgeCharacterChart' => $AgeCharacterChart->build($regionId),
                'UserAgeCharacterChart' => $UserAgeCharacterChart->build($regionId),
                'EmploymentByOccupationBarChart' => $EmploymentByOccupationBarChart->build($regionId),
                'UserEmploymentByOccupationBarChart' => $UserEmploymentByOccupationBarChart->build($regionId),
                'ageChart' => $ageChart->build($regionId), // Here ageChart has Housing data
                'UserHousingChart' => $UserHousingChart->build($regionId),
                'labourEducation' => $labourEducation->build($regionId),
                'UserLabourEducationPieChart' => $UserLabourEducationPieChart->build($regionId),
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
                'UserAge_distribution_65_years_and_over' => $UserAge_distribution_65_years_and_over,
                'UserAge_distribution_15_to_64' => $UserAge_distribution_15_to_64,
                'UserAge_distribution_0_to_14' => $UserAge_distribution_0_to_14,
                'UserPrivate_dwellings_occupied_by_usual_residents' => $UserPrivate_dwellings_occupied_by_usual_residents,
                'UserPrivate_dwellings_not_occupied_by_usual_residents' => $UserPrivate_dwellings_not_occupied_by_usual_residents,
                'UserTotal_private_dwellings' => $UserTotal_private_dwellings,
                'UserPopulation_percentage_change_2016_to_2021' => $UserPopulation_percentage_change_2016_to_2021,
                'UserPopulation_2016' => $UserPopulation_2016,
                'UserPopulation_2021' => $UserPopulation_2021,
                'City' => $City,
                'UserCity' => $UserCity,
                'cityData' => $cityData, 
                'selectedCity' => $selectedCity, 
                'birthChart'=> $birthChart,
                'businesses' => $businesses,
            ]);
    }

    // public function index(Request $request, LarapexChart $chart, 
    // AgeGroupsChart $ageChart, 
    // LabourEducationPieChart $labourEducation, 
    // EmploymentByOccupationBarChart $EmploymentByOccupationBarChart, 
    // AgeCharacterChart $AgeCharacterChart)
    // {
    //     $regionId = Session::has('regionId') ? Session::get('regionId') : 91;
    //     $labourData = Labour::where('CSDID', $regionId)->get();
    //     dd($labourData);

    //     return view('industries', 
    //         [
    //             'ageChart' => $ageChart->build($regionId),
    //             'labourEducation' => $labourEducation->build($regionId),
    //             'AgeCharacterChart' => $AgeCharacterChart->build($regionId),
    //             'EmploymentByOccupationBarChart' => $EmploymentByOccupationBarChart->build($regionId),
    //             'businessData' => $businessData,
    //             'demographyData' => $demographyData,
    //             'housingReviewRequestData' => $housingReviewRequestData,
    //             'categoryData' => $categoryData,
    //             'labourData' => $labourData,
    //             'housingReviewData' => $housingReviewData,
    //             'ageGenderData' => $ageGenderData,
    //             'housingData' => $housingData,

    //         ]);
    // }
}
