<?php

namespace App\Http\Controllers;

use App\Models\Business;
// use Illuminate\Support\Str;
// use App\Models\Review;

/////////////////////////  This is the part that I am changing  ////////////////////////////
use App\Models\Category;
/////////////////////////  This is the part that I am changing  ////////////////////////////

use Auth;
use Date;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    // public function index()
    // {
    //     return view('review');
    // }
/////////////////////////  This is the part that I am changing  ////////////////////////////
public function index()
{
    $data = category::all();
    // dd($data); // Add this line
    
    return view('category', ['data' => $data]);
}


   
public function add(Request $request)
{   
    // Map city codes to city names
    $cityNames = [
        "304" => "Baie Verte",
        "331" => "Bird Cove",
        "208" => "Bishop's Falls",
        "210" => "Botwood",
        "315" => "Conche",
        "188" => "Corner Brook",
        "190" => "Cox's Cove",
        "175" => "Deer Lake",
        "330" => "Flower's Cove",
        "207" => "Grand Falls-Windsor",
        "195" => "Hughes Brook",
        "360" => "Happy Valley-Goose Bay",
        "196" => "Irishtown-Summerside",
        "193" => "Lark Harbour",
        "187" => "Massey Drive",
        "191" => "McIvers",
        "194" => "Meadows",
        "197" => "Mount Moriah",
        "209" => "Peterview",
        "314" => "Roddickton-Bide Arm",
        "287" => "Springdale",
        "333" => "St. Anthony",
        "336" => "St. Lunaire-Griquet",
        "182" => "Steady Brook",
        "198" => "York Harbour",
        "362" => "Labrador City",
        "363" => "Wabush",
    ];

    // Get the city name based on the provided city code
    $regionName = $cityNames[$request->region];
    // dd($request->all());
    // dd($regionName);

    $data = new Category;
    $data->region = $regionName; // Use city name instead of city code
    $data->regionId = $request->cityCode;
    $data->year = $request->year;
    $data->industry = $request->industry;
    $data->business = $request->business;
    $data->employee = $request->employee;
    $data->location = $request->location;

    $data->save();

    return redirect()->back()->with('message', 'Request sent Successfully!');
}

/////////////////////////  This is the part that I am changing  ////////////////////////////

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function delete($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function accept($id)
{
    $dataToAccept = Category::find($id);

    // Split the location coordinates into latitude and longitude
    $coordinates = explode(', ', $dataToAccept->location);
    $latitude = $coordinates[0];
    $longitude = $coordinates[1];

    // Save $dataToAccept to the 'business' table
    Business::create([
        'last_action' => 'added', // Assuming this is the default value
        'region' => $dataToAccept->regionId,
        'year' => $dataToAccept->year,
        'industry' => $dataToAccept->industry,
        'name' => $dataToAccept->business, // Assuming 'business' corresponds to 'name'
        'employment' => $dataToAccept->employee,
        'location' => 'https://www.google.com/maps?q='.$latitude.','.$longitude,
        'latitude' => $latitude,
        'longitude' =>  $longitude,
        'is_master' => true,
        'master_id' => 1,
        'is_draft' => false,
        'created_by_id' => auth()->id(), // Assuming you have user authentication
        'updated_by_id' => auth()->id(), // Assuming you have user authentication
    ]);

    // Optionally, you can also delete the record from the original 'category' table
    $dataToAccept->delete();

    return redirect()->back();
}


    public function edit_data($id) {
        try {
            $dataToEdit = category::findOrFail($id);
            return view('edit', ['dataToEdit' => $dataToEdit]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            dd("Record not found");
        }
    }
    

    public function update_data(Request $request, $id)
    {
        $dataToUpdate = category::find($id);

        if (!$dataToUpdate) {
            // Add a check if the record is found
            dd($dataToUpdate);
            dd("Record not found");
        }

        $dataToUpdate->region = $request->input('region');
        $dataToUpdate->year = $request->input('year');
        $dataToUpdate->industry = $request->input('industry');
        $dataToUpdate->business = $request->input('business');
        $dataToUpdate->employee = $request->input('employee');
        $dataToUpdate->location = $request->input('location');
        $dataToUpdate->save();
        
        return redirect('/review')->with('status', 'Data updated Successfully!');
        
    }
// $drafts = Business::where('review_id','=', $review->id)->get();

        // foreach($drafts as $draft)
        // {
        //     $master = Business::where('id','=', $draft->master_id)->first();

        //     $master->last_action = $draft->last_action;
        //     $master->municipality = $draft->municipality;
        //     $master->year = $draft->year;
        //     $master->industry = $draft->industry;
        //     $master->name = $draft->name;
        //     $master->employment = $draft->employment;
        //     $master->location = $draft->location;
        //     $master->is_draft = false;

        //     $master->save();
        // }

        // $review->status = 'Approved';
        // $review->save();

        // return response([],200);

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = Review::where('status','Draft')
            // ->where('submitted_by_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if($review == null)
        {
            return response([],418);
        }

        $review->status = 'Pending';
        $review->date_submitted = Date::now();
        $review->save();

        // TODO: Notification logic goes here

        return response([],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\View\View
     */
    public function show(Review $review)
    {
        return view('review-view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\View\View
     */
    public function edit(Review $review)
    {
        return view('review-amend');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->status = 'Rejected';
        $review->save();

        return response([],200);
    }

    public function amend(Review $review)
    {
        $drafts = Business::where('review_id','=', $review->id)->get();

        foreach($drafts as $draft)
        {
            $master = Business::where('id','=', $draft->master_id)->first();

            $master->last_action = $draft->last_action;
            $master->municipality = $draft->municipality;
            $master->year = $draft->year;
            $master->industry = $draft->industry;
            $master->name = $draft->name;
            $master->employment = $draft->employment;
            $master->location = $draft->location;
            $master->is_draft = false;

            $master->save();
        }

        $review->status = 'Amended';
        $review->save();

        return response([],200);
    }

    // public function make(){
    //     return view('review.category');
    // }
}
