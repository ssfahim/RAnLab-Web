<?php

namespace App\Http\Controllers;

use App\Models\Housing;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Response;

class HousingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('housing');
    }

    public function downloadCsv()
    {
        $regionId = Session::has('regionId') ? Session::get('regionId') : auth()->user()->city;

        // Fetch all data from the 'housing' table
        $housingForUser = Housing::where('CSDID', auth()->user()->city)->get();
        $housingForSelectedRegion = Housing::where('CSDID', $regionId)->get();


        // Define the CSV file header
        $csvHeader = ['CSDID', 'CSDTxt', 'Total_private_dwellings', 'Private_dwellings_occupied_by_usual_residents', 
            'Private_dwellings_not_occupied_by_usual_residents','Average_household_size','Owner', 'Renter', 
            'Total_owner_and_tenant_households_with_household_total_income','In_core_need','Not_in_core_need'];

        // Initialize the CSV content with the header
        $csvContent = implode(',', $csvHeader) . "\n";

        // Add rows to the CSV content
        foreach ($housingForUser as $housing) {
            $csvContent .= implode(',', [
                // $housingForUser->id,
                $housing->CSDID,
                $housing->CSDTxt,
                $housing->Total_private_dwellings,
                $housing->Private_dwellings_occupied_by_usual_residents,
                $housing->Private_dwellings_not_occupied_by_usual_residents,
                $housing->Average_household_size,
                $housing->Owner,
                $housing->Renter,
                $housing->Total_owner_and_tenant_households_with_household_total_income,
                $housing->In_core_need,
                $housing->Not_in_core_need,
            ]) . "\n";
        }

        foreach ($housingForSelectedRegion as $housing) {
            $csvContent .= implode(',', [
                // $housingForUser->id,
                $housing->CSDID,
                $housing->CSDTxt,
                $housing->Total_private_dwellings,
                $housing->Private_dwellings_occupied_by_usual_residents,
                $housing->Private_dwellings_not_occupied_by_usual_residents,
                $housing->Average_household_size,
                $housing->Owner,
                $housing->Renter,
                $housing->Total_owner_and_tenant_households_with_household_total_income,
                $housing->In_core_need,
                $housing->Not_in_core_need,
            ]) . "\n";
        }

        // Set the CSV filename
        $fileName = 'housing_data.csv';

        // Create the CSV response
        $response = Response::make($csvContent, 200);
        $response->header('Content-Type', 'text/csv');
        $response->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');

        return $response;
    }
}
