@extends('layouts.app')

@section('page-title', 'Register')

@section('content')

<div class="flex flex-col justify-center py-12 bg-gray-50 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="w-auto h-24 mx-auto"
             src="{{ asset('logo.png') }}"
             alt="Workflow" />
        <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
            Create an Account
        </h2>
    </div>

    <div class="mx-5 mt-8 sm:mx-0 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 border border-gray-400 shadow-lg bg-gray-50 sm:rounded-lg sm:px-10">
            <form action="{{ route('register') }}"
                  method="POST">

                @honeypot
                @csrf

                <div>
                    <label for="email"
                           class="block text-sm font-medium leading-5 text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="email"
                               name="email"
                               type="email"
                               required
                               autofocus
                               value="{{ old('email') }}"
                               class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-400 rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" />
                    </div>

                    @error('email')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password"
                           class="block text-sm font-medium leading-5 text-gray-700">
                        Username
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="username"
                               type="text"
                               name="username"
                               required
                               value="{{ old('username') }}"
                               class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-400 rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" />
                    </div>

                    @error('username')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password"
                           class="block text-sm font-medium leading-5 text-gray-700">
                        Password
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-400 rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" />
                    </div>

                    @error('password')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password_confirmation"
                           class="block text-sm font-medium leading-5 text-gray-700">
                        Password Confirmation
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               required
                               class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-400 rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" />
                    </div>

                    @error('password_confirmation')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input id="accept_terms"
                               name="accept_terms"
                               type="checkbox"
                               class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-checkbox" />
                        <label for="remember"
                               class="block mt-1 ml-2 text-sm leading-none leading-5 text-gray-900">
                            Agree to <a href="{{ route('pages.terms') }}">Terms and Conditions</a>
                        </label>
                    </div>
                </div>

                @error('accept_terms')
                    <span class="mt-1 text-sm text-red-600">
                        You must accept the terms and conditions
                    </span>
                @enderror

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit"
                                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-indigo-700 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-900 focus:shadow-xl focus:shadow-outline-indigo active:bg-indigo-700 hover:shadow-xl">
                            Sign Up
                        </button>
                    </span>
                </div>
            </form>

            {{-- <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm leading-5">
                        <span class="px-2 text-gray-500 bg-white">
                            Or continue with
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-3 mt-6">
                    <div>
                        <span class="inline-flex w-full rounded-md shadow-sm">
                            <button type="button"
                                    class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue"
                                    aria-label="Sign in with Google">
                                @svg('chrome')
                            </button>
                        </span>
                    </div>

                    <div>
                        <span class="inline-flex w-full rounded-md shadow-sm">
                            <button type="button"
                                    class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue"
                                    aria-label="Sign in with Twitter">
                                <svg class="h-5"
                                     fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path
                                          d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </button>
                        </span>
                    </div>

                    <div>
                        <span class="inline-flex w-full rounded-md shadow-sm">
                            <button type="button"
                                    class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md hover:text-gray-400 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue"
                                    aria-label="Sign in with GitHub">
                                <svg class="h-5"
                                     fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                                          clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</div>

@endsection