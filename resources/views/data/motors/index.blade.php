@extends('data.layout')

@section('data-content')

<div class="mx-10">

    <h1 class="text-2xl font-semibold mb-5">Motors</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Type</th>
                    <th scope="col">Class</th>
                    <th scope="col">Name</th>
                    <th scope="col">Diameter</th>
                    <th scope="col">Height</th>
                    <th scope="col">Total Impulse</th>
                    <th scope="col">Propellant Mass</th>
                    <th scope="col">Dry Mass</th>
                    <th scope="col">Total Mass</th>
                    <th scope="col">Average Thrust</th>
                    <th scope="col">Max Thrust</th>
                    <th scope="col">Burn Time</th>
                    <th scope="col">Delay Time</th>
                    <th scope="col">Vendor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($motors as $motor)
                    <tr>
                        <th scope="row">{{ $motor->id }}</th>
                        <td>{{ $motor->type->name }}</td>
                        <td>{{ $motor->class->name }}</td>
                        <td>{{ $motor->name }}</td>
                        <td>{{ $motor->diameter }}</td>
                        <td>{{ $motor->height }}</td>
                        <td>{{ $motor->total_impulse }}</td>
                        <td>{{ $motor->propellant_mass }}</td>
                        <td>{{ $motor->dry_mass }}</td>
                        <td>{{ $motor->total_mass }}</td>
                        <td>{{ $motor->average_thrust }}</td>
                        <td>{{ $motor->max_thrust }}</td>
                        <td>{{ $motor->burn_time }}</td>
                        <td>{{ $motor->delay_time }}</td>
                        <td>{{ $motor->vendor->name }}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

</div>

@endsection