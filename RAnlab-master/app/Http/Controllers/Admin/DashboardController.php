<?php

namespace App\Http\Controllers;

use App\Charts\AgeGroupsChart;
use App\Charts\BirthsDeathsChart;
use App\Charts\PopulationChangeChart;
use Session;

class DashboardController extends Controller
{
    public function index(AgeGroupsChart $ageChart, PopulationChangeChart $popChart, BirthsDeathsChart $birthChart)
    {
        $regionId = Session::has('regionId') ? Session::get('regionId')%3 : 0;

        return view('dashboard',
            [
                'ageChart' => $ageChart->build($regionId),
                'popChart' => $popChart->build($regionId),
                'birthChart' => $birthChart->build($regionId),
            ]);
    }

    public function dashboard(int $regionId, AgeGroupsChart $ageChart, PopulationChangeChart $popChart, BirthsDeathsChart $birthChart)
    {
        return view('dashboard',
            [
                'ageChart' => $ageChart->build($regionId%3),
                'popChart' => $popChart->build($regionId%3),
                'birthChart' => $birthChart->build($regionId%3),
            ]);
    }
}
