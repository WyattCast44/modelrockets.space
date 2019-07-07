@extends('data.layout')

@section('page-title', 'Motors')

@section('data-content')

<div class="mx-auto" style="max-width:90%">

    <h1 class="text-2xl font-semibold mb-5">Motors</h1>

    <div class="table-responsive">

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Type</th>
                    <th scope="col">Class</th>
                    <th scope="col">Name</th>
                    <th scope="col">Diameter (mm)</th>
                    <th scope="col">Total Impulse (N&middot;s)</th>
                    <th scope="col">Propellant Mass (g)</th>
                    <th scope="col">Average Thrust (N)</th>
                    <th scope="col">Max Thrust (N)</th>
                    <th scope="col">Burn Time (s)</th>
                    <th scope="col">Delay Time (s)</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($motors as $motor)
                    <tr>
                        <th class="text-center align-middle" scope="row">{{ $motor->id }}</th>
                        <td class="text-center align-middle">{{ $motor->type->name }}</td>
                        <td class="text-center align-middle uppercase">{{ $motor->class->name }}</td>
                        <td class="text-center align-middle">{{ $motor->name }}</td>
                        <td class="text-center align-middle">{{ $motor->diameter }}</td>
                        <td class="text-center align-middle">{{ $motor->total_impulse }}</td>
                        <td class="text-center align-middle">{{ $motor->propellant_mass }}</td>
                        <td class="text-center align-middle">{{ $motor->average_thrust }}</td>
                        <td class="text-center align-middle">{{ $motor->max_thrust }}</td>
                        <td class="text-center align-middle">{{ $motor->burn_time }}</td>
                        <td class="text-center align-middle">{{ $motor->delay_time }}</td>
                        <td class="text-left align-middle">
                            <a href="{{ $motor->vendor->website }}" target="_blank">
                                {{ $motor->vendor->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ $motor->path('show') }}">@svg('eye', 'inline w-12')</a>
                        </td>
                    </tr>
                @endforeach                
            </tbody>
        </table>

    </div>

    {{ $motors->links() }}

</div>

@endsection