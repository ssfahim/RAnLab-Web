<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabourController extends Controller
{
    public function index()
    {
        return view('labor-supply');
    }
}
