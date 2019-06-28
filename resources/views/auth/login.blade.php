@extends('layouts.app')

@section('page-title', 'Login')

@section('content')

<div class="flex flex-col justify-center items-center h-screen">

    <form method="POST" action="{{ route('login') }}" class="border border-solid border-gray-300 bg-white p-12">

        @csrf

        <!-- Email -->
        <div class="form-group">

            <label for="email" class="mb-5">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="form-control mt-2" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <!-- Password -->
        <div class="form-group">

            <label for="password">{{ __('Password') }}</label>
            
            <input id="password" type="password" class="form-control mt-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
        </div>

        <!-- Remember Checkbox -->
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <!-- Submit Btn -->
        <div class="mt-5 form-group mb-0">

            <button type="submit" class="btn btn-primary mr-4">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Password?
                </a>

            @endif

        </div>

    </form>

</div>

@endsection