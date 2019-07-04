@extends('data.layout')

@section('data-content')

<div class="container">

    <h1 class="text-2xl font-semibold mb-5">{{ $motor->name }}</h1>

    <div class="table-responsive mb-5">

        <table class="table table-bordered table-striped">
            <thead>
                    <th scope="col">Key</th>
                    <th scope="col">Value</th>
            </thead>
            <tbody>

                <tr>
                    <td scope="col">Type</td>
                    <td class="uppercase">{{ $motor->type->name }}</td>
                </tr>
                <tr>
                    <td scope="col">Class</td>
                    <td class="uppercase">
                        {{ $motor->class->name }} <span class="text-sm text-gray-700">({{ $motor->class->min_impulse }} - {{ $motor->class->max_impulse }} N&middot;s)</span>
                    </td>
                </tr>
                <tr>
                    <td scope="col">Diameter (mm)</td>
                    <td>{{ $motor->diameter }}</td>
                </tr>
                <tr>
                    <td scope="col">Height (mm)</td>
                    <td>{{ $motor->height }}</td>
                </tr>
                <tr>
                    <td scope="col">Total Impulse (N&middot;s)</td>
                    <td>{{ $motor->total_impulse }}</td>
                </tr>
                <tr>
                    <td scope="col">Propellant Mass (g)</td>
                    <td>{{ $motor->propellant_mass }}</td>
                </tr>
                <tr>
                    <td scope="col">Dry Mass (g)</td>
                    <td>{{ $motor->dry_mass }}</td>
                </tr>
                <tr>
                    <td scope="col">Total Mass (g)</td>
                    <td>{{ $motor->total_mass }}</td>
                </tr>
                <tr>
                    <td scope="col">Average Thrust (N)</td>
                    <td>{{ $motor->average_thrust }}</td>
                </tr>
                <tr>
                    <td scope="col">Max Thrust (N)</td>
                    <td>{{ $motor->max_thrust }}</td>
                </tr>
                <tr>
                    <td scope="col">Burn Time (s)</td>
                    <td>{{ $motor->burn_time }}</td>
                </tr>
                <tr>
                    <td scope="col">Delay Time (s)</td>
                    <td>{{ $motor->delay_time }}</td>
                </tr>
                <tr>
                    <td scope="col">Vendor</td>
                    <td>
                        <a href="{{ $motor->vendor->website }}" target="_blank">
                            {{ $motor->vendor->name }}
                        </a>
                    </td>
                </tr>
                
            </tbody>
        </table>

    </div>

    <h1 class="text-2xl font-semibold mb-5">Attachments</h1>

    <div class="mb-10">
            @foreach ($motor->attachments as $attachment)  
                <a href="{{ $attachment->url_raw }}" class="cursor-pointer hover:no-underline">
                    <img src="{{ $attachment->url_thumbnail }}" alt="Title" class="hover:shadow-xl inline mx-1 border border-solid border-gray-700 shadow-md w-12 hover:border-blue-700 h-12 rounded mb-2">    
                </a>  
            @endforeach
        </div>

</div>

@endsection