<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Review;
use Auth;
use Date;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('business');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('business-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = $this->fetchOrCreateReview();
        $business = $this->generateDraftFromRequest($request);

        $business->review_id = $review->id;
        $business->is_master = true;
        $business->master_id = $business->id;
        $business->save();

        return response([],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\View\View
     */
    public function edit(Business $business)
    {
        return view('business-edit');
    }

    public function food(Business $business)
    {
        return view('food');
    }

    // public function edit(Business $business)
    // {
    //     return view('business-edit', compact('business'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        error_log("Request Data: " . json_encode($request->all()));
        if($business->is_master && !$business->is_draft)
        {
            $review = $this->fetchOrCreateReview();
            $draft = $this->generateDraftFromRequest($request);

            $draft->region = $business->region;
            $draft->master_id = $business->id;
            $draft->review_id = $review->id;
            $draft->save();
        }
        else
        {
            error_log("Before Update - Business Data: " . json_encode($business->toArray()));

            $business->last_action = $request->last_action;
            $business->region = 1;
            error_log("After Update - Business Data: " . json_encode($business->toArray()));

            $business->year = $request->year;
            $business->industry = $request->industry;
            $business->name = $request->name;
            $business->employment = $request->employment;
            $business->location = $request->location;
            $business->save();
        }

        return response([],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        $business->delete();

        // You can emit an event or perform other actions after the deletion if needed
        // Example: event(new BusinessDeleted($business));

        return response([], 200);
    }

    private function fetchOrCreateReview()
    {
        $review = Review::where('status','Draft')
            // Put this clause back once Review Workflow hardened ->where('submitted_by_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if($review == null)
        {
            $review = new Review;
            $review->submitted_by_id = Auth::user()->id;
            $review->status = 'Draft';
            $review->save();
        }

        return $review;
    }

    private function generateDraftFromRequest(Request $request)
    {
        $business = new Business;
        $business->last_action = $request->last_action;
        $business->region = 1;
        $business->year = $request->year;
        $business->industry = $request->industry;
        $business->name = $request->name;
        $business->employment = $request->employment;
        $business->location = $request->location;
        $business->is_master = false;
        $business->is_draft = true;
        $business->save();

        return $business;
    }

    
}
