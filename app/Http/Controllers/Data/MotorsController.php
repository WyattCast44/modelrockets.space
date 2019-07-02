<?php

namespace App\Http\Controllers\Data;

use App\Motor;
use App\Http\Controllers\Controller;

class MotorsController extends Controller
{
    public function index()
    {
        $motors = Motor::all();

        return view('data.motors.index', ['motors' => $motors]);
    }
}
