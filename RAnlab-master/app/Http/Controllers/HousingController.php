<?php

namespace App\Http\Controllers;

use App\Models\Housing;
use Illuminate\Http\Request;

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
}
