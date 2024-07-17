<?php

namespace App\Http\Controllers;

use App\Models\Labour;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Response;

class LabourController extends Controller
{
    public function index()
    {
        return view('labor-supply');
    }

    public function downloadCsv()
    {
        $regionId = Session::has('regionId') ? Session::get('regionId') : auth()->user()->city;

        // Fetch all data from the 'labour' table
        $labourForUser = Labour::where('CSDID', auth()->user()->city)->get();
        $labourForSelectedRegion = Labour::where('CSDID', $regionId)->get();


        // Define the CSV file header
        $csvHeader = [
            'CSDID',
            'CSDTxt',
            'Total_Highest_certificate_diploma_or_degree',
            'No_certificate_diploma_or_degree',
            'High_school_diploma',
            'Postsecondary_certificate_or_diploma_below_bachelor',
            'Bachelor_degree',
            'University_certificate_or_diploma_above_bachelor',
            'Total_Population_aged_15_years_and_over_by_labour_force',
            'Participation_rate',
            'Unemployment_rate',
            'Average_weeks_worked_in_reference_year',
            'Worked_full_year_full_time',
            'Worked_part_year_and_or_part_time',
            'Total_Labour_force_aged_15_years_and_over_by_occupation',
            'Occupation_not_applicable',
            'All_occupations',
            'Legislative_and_senior_management_occupations',
            'Business_finance_and_administration_occupations',
            'Natural_and_applied_sciences_and_related_occupations',
            'Health_occupations',
            'Occupations_in_education_law_and_social',
            'Occupations_in_art_culture_recreation_and_sport',
            'Sales_and_service_occupations',
            'Trades_transport_and_equipment_operators',
            'Natural_resources_agriculture_and_related',
            'Occupations_in_manufacturing_and_utilities',
        ];

        // Initialize the CSV content with the header
        $csvContent = implode(',', $csvHeader) . "\n";

        // Add rows to the CSV content
        foreach ($labourForUser as $labour) {
            $csvContent .= implode(',', [
                // $labourForUser->id,
                $labour->CSDID,
                $labour->CSDTxt,
                $labour->Total_Highest_certificate_diploma_or_degree,
                $labour->No_certificate_diploma_or_degree,
                $labour->High_school_diploma,
                $labour->Postsecondary_certificate_or_diploma_below_bachelor,
                $labour->Bachelor_degree,
                $labour->University_certificate_or_diploma_above_bachelor,
                $labour->Total_Population_aged_15_years_and_over_by_labour_force,
                $labour->Participation_rate,
                $labour->Unemployment_rate,
                $labour->Average_weeks_worked_in_reference_year,
                $labour->Worked_full_year_full_time,
                $labour->Worked_part_year_and_or_part_time,
                $labour->Total_Labour_force_aged_15_years_and_over_by_occupation,
                $labour->Occupation_not_applicable,
                $labour->All_occupations,
                $labour->Legislative_and_senior_management_occupations,
                $labour->Business_finance_and_administration_occupations,
                $labour->Natural_and_applied_sciences_and_related_occupations,
                $labour->Health_occupations,
                $labour->Occupations_in_education_law_and_social,
                $labour->Occupations_in_art_culture_recreation_and_sport,
                $labour->Sales_and_service_occupations,
                $labour->Trades_transport_and_equipment_operators,
                $labour->Natural_resources_agriculture_and_related,
                $labour->Occupations_in_manufacturing_and_utilities,
            ]) . "\n";
        }

        foreach ($labourForSelectedRegion as $labour) {
            $csvContent .= implode(',', [
                // $labourForUser->id,
                $labour->CSDID,
                $labour->CSDTxt,
                $labour->Total_Highest_certificate_diploma_or_degree,
                $labour->No_certificate_diploma_or_degree,
                $labour->High_school_diploma,
                $labour->Postsecondary_certificate_or_diploma_below_bachelor,
                $labour->Bachelor_degree,
                $labour->University_certificate_or_diploma_above_bachelor,
                $labour->Total_Population_aged_15_years_and_over_by_labour_force,
                $labour->Participation_rate,
                $labour->Unemployment_rate,
                $labour->Average_weeks_worked_in_reference_year,
                $labour->Worked_full_year_full_time,
                $labour->Worked_part_year_and_or_part_time,
                $labour->Total_Labour_force_aged_15_years_and_over_by_occupation,
                $labour->Occupation_not_applicable,
                $labour->All_occupations,
                $labour->Legislative_and_senior_management_occupations,
                $labour->Business_finance_and_administration_occupations,
                $labour->Natural_and_applied_sciences_and_related_occupations,
                $labour->Health_occupations,
                $labour->Occupations_in_education_law_and_social,
                $labour->Occupations_in_art_culture_recreation_and_sport,
                $labour->Sales_and_service_occupations,
                $labour->Trades_transport_and_equipment_operators,
                $labour->Natural_resources_agriculture_and_related,
                $labour->Occupations_in_manufacturing_and_utilities,
            ]) . "\n";
        }

        // Set the CSV filename
        $fileName = 'labour_data.csv';

        // Create the CSV response
        $response = Response::make($csvContent, 200);
        $response->header('Content-Type', 'text/csv');
        $response->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');

        return $response;
    }
}
