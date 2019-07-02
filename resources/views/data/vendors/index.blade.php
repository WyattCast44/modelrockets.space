@extends('data.layout')

@section('data-content')

<div class="container">

    <h1 class="text-2xl font-semibold mb-5">Vendors</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Website</th>
                <th scope="col">Descrption</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendors as $vendor)
                    <tr>
                        <th scope="row">{{ $vendor->id }}</th>
                        <td>{{ $vendor->name }}</td>
                        <td><a href="{{ $vendor->website }}" target="_blank">{{ $vendor->website }}</a></td>
                        <td>{{ $vendor->description }}</td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    
</div>

@endsection