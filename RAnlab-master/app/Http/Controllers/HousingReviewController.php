<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demography;
use Auth;
use Date;
use App\Models\HousingReview;
use App\Models\HousingReviewRequest;

class HousingReviewController extends Controller
{
    public function index()
    {
        return view('housing-review');
    }

    public function add(Request $request)
    {
        // $data = HousingReview::all();
        // $regionName = $cityNames[$request->region];
        if(auth()->user()->email == "test@test.com")
        {
            // dd($request->cityCode);
            $regionName = Demography::where('id', $request->cityCode)->value('geog_text');
            $data = new HousingReview;
            $data->CSDTxt = $regionName;
            $data->CSDID = $request->cityCode;
            $data->year = $request->year;
            $data->number_Of_bedrooms = $request->number_Of_bedrooms;
            $data->house_structure = $request->house_structure;
            $data->location = $request->location;

            $data->save();

            return redirect()->back()->with('message', 'New Data added to List Successfully!');

        }
        else{
            $regionName = Demography::where('id',  auth()->user()->city)->value('geog_text');
            $data = new HousingReviewRequest;
            $data->CSDTxt = $regionName;
            $data->CSDID = auth()->user()->city;
            $data->year = $request->year;
            $data->number_Of_bedrooms = $request->number_Of_bedrooms;
            $data->house_structure = $request->house_structure;
            $data->location = $request->location;

            $data->save();

            return redirect()->back()->with('message', 'Request sent Successfully!');
        }
    }

    public function delete($id)
    {
        $data = HousingReviewRequest::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function accept($id)
    {
        $dataToAccept = HousingReviewRequest::find($id);

        // Split the location coordinates into latitude and longitude
        // $coordinates = explode(', ', $dataToAccept->location);
        // $latitude = $coordinates[0];
        // $longitude = $coordinates[1];

        // Save $dataToAccept to the 'business' table
        HousingReview::create([
            'CSDID' => $dataToAccept->CSDID,
            'CSDTxt' =>  $dataToAccept->CSDTxt,
            'year' => $dataToAccept->year,
            'number_Of_bedrooms' => $dataToAccept->number_Of_bedrooms,
            'house_structure' => $dataToAccept->house_structure, 
            'location' => $dataToAccept->location,
            // 'location' => 'https://www.google.com/maps?q='.$latitude.','.$longitude,
            // 'latitude' => $latitude,
            // 'longitude' =>  $longitude,
            // 'is_master' => true,
            // 'master_id' => 1,
            // 'is_draft' => false,
            // 'created_by_id' => auth()->id(), 
            // 'updated_by_id' => auth()->id(), 
        ]);

        // Optionally, you can also delete the record from the original 'category' table
        $dataToAccept->delete();

        return redirect()->back();
    }

    public function edit_data($id) {
        try {
            $dataToEdit = HousingReviewRequest::findOrFail($id);
            return view('editHousingRequest', ['dataToEdit' => $dataToEdit]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            dd("Record not found");
        }
    }
    

    public function update_data(Request $request, $id)
    {
        $dataToUpdate = HousingReviewRequest::find($id);

        if (!$dataToUpdate) {
            // Add a check if the record is found
            dd($dataToUpdate);
            dd("Record not found");
        }

        // 'CSDID' => $dataToAccept->regionId,
        //     'CSDTxt' =>  $dataToAccept->regionId,
        //     'year' => $dataToAccept->year,
        //     'number_Of_bedrooms' => $dataToAccept->number_Of_bedrooms,
        //     'house_structure' => $dataToAccept->house_structure, 
        //     'location' => $dataToAccept->location,

        $dataToUpdate->CSDID = $request->input('CSDID');
        $dataToUpdate->CSDTxt = $request->input('CSDTxt');
        $dataToUpdate->year = $request->input('year');
        $dataToUpdate->number_Of_bedrooms = $request->input('number_Of_bedrooms');
        $dataToUpdate->house_structure = $request->input('house_structure');
        $dataToUpdate->location = $request->input('location');
        $dataToUpdate->save();
        
        return redirect('/review')->with('status', 'Data updated Successfully!');
        
    }
}
