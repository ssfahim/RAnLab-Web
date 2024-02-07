<?php

namespace App\Http\Controllers;

use App\Models\Demography;
use Illuminate\Http\Request;
use Session;

class RegionSelectController extends Controller
{
    public function setRegion(int $regionId)
    {
        Session::put('regionId', $regionId);

        if ($regionId === 0) {
            Session::forget('regionText');
        } else {
            $region = Demography::find($regionId);

            if ($region) {
                Session::put('regionText', $region->geog_text);
            } else {
                // Handle the case where the region with the specified ID is not found
                Session::forget('regionText');
            }
        }
    }
}
