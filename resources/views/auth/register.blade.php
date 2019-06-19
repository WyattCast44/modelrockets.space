@extends('layouts.app')

@section('page-title', 'Register')

@section('content')

<div class="flex flex-col justify-center items-center h-screen">

    <form method="POST" action="{{ route('register') }}" class="border border-solid border-gray-300 bg-white p-12">

        @csrf

        <!-- Username -->
        <div class="form-group">

            <label for="username">{{ __('Username') }}</label>

            <input id="username" type="text" class="form-control mt-2 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <!-- Email -->
        <div class="form-group">

            <label for="email">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="form-control mt-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <!-- Password -->
        <div class="form-group">

            <label for="password">{{ __('Password') }}</label>

            <input id="password" type="password" class="form-control mt-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <!-- Password Confirm -->
        <div class="form-group">

            <label for="password-confirm">{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" class="mt-2 form-control" name="password_confirmation" required autocomplete="new-password">

        </div>
        
        <!-- Submit -->
        <div class="form-group mb-0">
            
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>

        </div>

    </form>
    
</div>

@endsection
