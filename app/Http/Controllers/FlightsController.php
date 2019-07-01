<?php

namespace App\Http\Controllers;

use App\User;
use App\Flight;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }
    
    public function create(User $user)
    {
        if (auth()->id() <> $user->id) {
            return abort(403);
        }

        return view('users.flights.create', ['user' => $user]);
    }

    public function index(User $user)
    {
        $this->authorize('view', $user);

        $flightGroups = $user->flights->groupBy(function ($flight) {
            return $flight->date->format('d | M | Y ');
        });

        return view('users.flights.index', ['user' => $user, 'flightGroups' => $flightGroups]);
    }

    public function show(User $user, Flight $flight)
    {
        $this->authorize('view', $user);

        $flight->load('attachments');
        
        return view('users.flights.show', ['flight' => $flight, 'user' => $user]);
    }

    public function store(User $user, Request $request)
    {
        if (auth()->id() <> $user->id) {
            return abort(403);
        }
        
        $this->validate($request, [
            'date' => 'required|date',
            'rocket' => 'required|string|max:255',
            'motors' => 'nullable|string|max:255',
            'altitude' => 'nullable|string|max:255',
            'description' => 'required|string',
            'attachments.*' => 'nullable|mimes:jpg,jpeg,png,bmp|max:20000',
        ]);

        $flight = $user->flights()->create([
            'date' => $request->date,
            'rocket' => $request->rocket,
            'motors' => $request->motors,
            'altitude' => $request->altitude,
            'description' => $request->description,
        ]);

        return redirect()->route('flights.show', ['user' => $user, 'flight' => $flight]);
    }
}
