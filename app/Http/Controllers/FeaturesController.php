<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;

class FeaturesController extends Controller
{
    public function index()
    {
        $openFeatures = Feature::public()
                            ->open()
                            ->with(['votes'])
                            ->get();

        $closedFeatures = Feature::public()
                            ->closed()
                            ->with('votes')
                            ->get();
        
        return view('features.index', [
            'openFeatures' => $openFeatures,
            'closedFeatures' => $closedFeatures,
        ]);
    }
}
