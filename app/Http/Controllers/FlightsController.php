<?php

namespace App\Http\Controllers;

use App\User;
use App\Flight;

class FlightsController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('view', $user);
        
        $flights = $user->flights()->simplePaginate(8);

        return view('users.flights.index', ['flights' => $flights, 'user' => $user]);
    }

    public function show(User $user, Flight $flight)
    {
        $this->authorize('view', $user);

        $flight->load('attachments');
        
        return view('users.flights.show', ['flight' => $flight, 'user' => $user]);
    }
}
