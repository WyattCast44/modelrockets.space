<?php

namespace App\Http\Controllers;

use App\User;

class FlightsController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('view', $user);
        
        $flights = $user->flights()->simplePaginate(8);

        return view('users.flights.index', ['flights' => $flights, 'user' => $user]);
    }
}
