<?php

namespace App\Http\Controllers;

use App\User;
use App\Flight;

class FlightsController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('view', $user);

        $flightGroups = $user->flights->groupBy(function ($flight) {
            return $flight->date->format('d | M');
        });

        return view('users.flights.index', ['user' => $user, 'flightGroups' => $flightGroups]);
    }

    public function show(User $user, Flight $flight)
    {
        $this->authorize('view', $user);

        $flight->load('attachments');
        
        return view('users.flights.show', ['flight' => $flight, 'user' => $user]);
    }
}
