@extends('users.layout')

@section('user-content')

    <div class="container mb-16">
        <h2 class="mb-8 text-2xl font-semibold">Create New Flight Record</h2>

        <form action="{{ route('flights.store', auth()->user()) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @honeypot
            
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" placeholder="When did you launch." class="form-control" required>
            </div>

            <div class="form-group">
                <label for="rocket">Rocket Name</label>
                <input type="text" name="rocket" placeholder="Your rockets name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="motors">Motor</label>
                <select name="motor_id" class="form-control">
                    @foreach($motors as $motor)
                        <option value="{{ $motor->id }}">{{ $motor->name }} ({{ $motor->vendor->name }})</option>
                    @endforeach
                </select>                
            </div>

            <div class="form-group">
                    <label for="motors">Motor Quantity</label>
                    <input type="number" name="motor_quantity" class="form-control">
                </div>

            <div class="form-group">
                <label for="altitude">Altitude</label>
                <input type="text" name="altitude" placeholder="Ex. 512 ft" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description of Launch</label>
                <textarea id="description" name="description" class="form-control"></textarea>
                <small class="text-gray-600">This textarea supports markdown</small>
            </div>

            {{-- <div class="my-8">
                <trix-editor input="description"></trix-editor>
            </div> --}}

            {{-- <div class="form-group" data-controller="multifile">
                <label for="attachments[]" class="text-lg text-gray-600">Attachments</label>
            
                <div class="custom-file">
                    <input
                        type="file"
                        data-target="multifile.source"
                        data-action="change->multifile#handle"
                        class="custom-file-input"
                        name="attachments[]"
                        id="attachments"
                        multiple
                    />
            
                    <label class="custom-file-label" for="attachments[]" data-target="multifile.text"
                        >Choose file(s)</label
                    >
                </div>
    
                @error('attachments.*')
                    <small class="text-red-400 font-semibol">{{ $message }}</small>
                @enderror
            
                <div class="-mx-2" data-target="multifile.listContainer">
                    <li
                        data-target="multifile.listTemplate"
                        class="mx-2 mb-2 p-2 bg-gray-200 text-xs hidden border border-solid border-gray-300 rounded"
                    ></li>
                    <ul data-target="multifile.list" class="list-none flex my-4 flex-wrap"></ul>
                </div>
    
            </div>   --}}

            <div class="form-group flex justify-end">
                <a href="#" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

    </div>

@endsection