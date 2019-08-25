<?php

namespace App\Http\Controllers;

use App\User;
use App\Flight;
use Illuminate\Http\Request;
use App\Motor;
use Illuminate\Support\Carbon;

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

        $motors = Motor::with(['vendor', 'type'])->get();

        return view('users.flights.create', ['user' => $user, 'motors' => $motors]);
    }

    public function index(User $user)
    {
        $this->authorize('view', $user);

        $flightGroups = $user->flights->groupBy(function ($flight) {
            return $flight->date->format('d M y');
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
            'motor_id' => 'nullable|exists:motors,id',
            'motor_quantity' => 'nullable|numeric|max:100',
            'altitude' => 'nullable|string|max:255',
            'description' => 'required|string',
            'attachments.*' => 'nullable|mimes:jpg,jpeg,png,bmp|max:20000',
        ]);

        $flight = $user->flights()->create([
            'date' => Carbon::parse($request->date)->toDateString(),
            'rocket' => $request->rocket,
            'motor_id' => $request->motor_id,
            'motor_quantity' => $request->motor_quantity,
            'altitude' => $request->altitude,
            'description' => $request->description,
        ]);

        return redirect()->route('flights.show', ['user' => $user, 'flight' => $flight]);
    }
}
