<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- Success message -->
        @if(session('success'))
        <div style="background-color: #dcfce7; color: black; padding: 1rem; margin-bottom: 1rem; border-radius: 0.25rem;">
            {{ session('success') }}
        </div>
        @endif

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Form Content (Using x-guest-layout instead of main) -->
            <x-guest-layout>
                <!-- Success message -->
                @if(session('success'))
                    <div class="bg-green-500 text-black p-4 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('store-user') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                      type="password"
                                      name="password_confirmation" required />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Role Dropdown -->
                    <div class="mt-4">
                        <x-input-label for="role" :value="__('Role')" />
                        <select id="role" name="role" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <option value="User" {{ old('role') === 'User' ? 'selected' : '' }}>User</option>
                            <option value="Admin" {{ old('role') === 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>


<!-- Submit Button -->
<div class="flex items-center justify-end mt-4">
    <x-primary-button class="ml-4">
        {{ __('Register') }}
    </x-primary-button>
</div>

                </form>
            </x-guest-layout>

        </div>

        <footer class="bg-gray-800 text-white py-6 mt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <!-- Left Side: Company Info -->
                    <div class="text-center md:text-left mb-4 md:mb-0">
                        <h2 class="text-lg font-semibold">PNE United</h2>
                        <p class="text-sm text-gray-400"><strong>Made with ❤️ By R&D</strong></p>
                    </div>

                    <!-- Center: Quick Links -->
                    <div class="flex space-x-6">
                        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-white text-sm">Dashboard</a>
                        <a href="{{ route('urls.index') }}" class="text-gray-400 hover:text-white text-sm">URL</a>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-700 mt-4 pt-4 text-center text-sm text-gray-400">
                    © {{ date('Y') }} PNE. All rights reserved.
                </div>
            </div>
        </footer>
    </body>
</html>
