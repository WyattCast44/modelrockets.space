<?php

namespace App\Http\Controllers\Data;

use App\Motor;
use App\Http\Controllers\Controller;

class MotorsController extends Controller
{
    public function index()
    {
        $motors = Motor::paginate(20);

        return view('data.motors.index', ['motors' => $motors]);
    }

    public function show(Motor $motor)
    {
        $motor->load('attachments');

        return view('data.motors.show', ['motor' => $motor]);
    }
}
