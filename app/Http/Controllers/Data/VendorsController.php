<?php

namespace App\Http\Controllers\Data;

use App\Vendor;
use App\Http\Controllers\Controller;

class VendorsController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();

        return view('data.vendors.index', ['vendors' => $vendors]);
    }
}
