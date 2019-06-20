<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;

class FeaturesController extends Controller
{
    public function index()
    {
        $openFeatures = Feature::public()->open()->with('user')->get();

        $closedFeatures = Feature::public()->closed()->with('user')->get();
        
        return view('features.index', [
            'openFeatures' => $openFeatures,
            'closedFeatures' => $closedFeatures,
        ]);
    }
}
