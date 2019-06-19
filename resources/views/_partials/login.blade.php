@modal(['name' => 'login'])

    <h2 class="text-2xl font-semibold mb-4 uppercase">Login</h2>

    <form method="POST" action="{{ route('login') }}" class="">

        @csrf

        <!-- Email -->
        <div class="form-group">

            <label for="email" class="mb-5 text-gray-600">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="form-control mt-2" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <!-- Password -->
        <div class="form-group">

            <label for="password" class="text-gray-600">{{ __('Password') }}</label>
            
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

                <label class="form-check-label text-gray-600" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <!-- Submit Btn -->
        <div class="mt-5 form-group mb-0 flex justify-end items-center">

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Password?
                </a>
            @endif

            <button type="submit" class="btn btn-primary mr-4">
                {{ __('Login') }}
            </button>

        </div>

    </form>

@endmodal