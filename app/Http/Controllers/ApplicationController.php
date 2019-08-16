<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class ApplicationController extends Controller
{
    //
    public function index()
    {
        $applications = Application::all();

        return response()->json(['success' => $applications]); 
    }

    public function create(Request $request)
    {
        $application = Application::create($request->all());

        return response()->json(['success' => $application]); 
    }
}
