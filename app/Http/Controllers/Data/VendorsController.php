<?php

namespace App\Http\Controllers\Data;

use App\Vendor;
use App\Http\Controllers\Controller;

class VendorsController extends Controller
{
    public function index()
    {
        $vendors = Vendor::paginate(10);

        return view('data.vendors.index', ['vendors' => $vendors]);
    }
}
