@extends('layouts.main')

@section('page-title', 'Login')

@section('content-layout')

    <div class="bg-restaurant min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="card-glass p-8">
                <div class="text-center mb-8">
                    <div class="flex justify-center mb-4">
                        <div class="bg-amber-500 p-3 rounded-full">
                            <i class="fas fa-utensils text-black text-3xl"></i>
                        </div>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800">PPKDJP POS</h1>
                    <p class="text-gray-600 mt-2">Restaurant Management System</p>
                </div>

                <form class="space-y-6" method="post" action="/action-login">
                    @csrf
                    <div class="space-y-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            <i class="fas fa-envelope mr-2 text-amber-500"></i> Email Address
                        </label>
                        <div class="relative">
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                class="input-focus w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-amber-500 transition duration-300 pl-10"
                                placeholder="Staff@restaurant.com">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            </div>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            <i class="fas fa-lock mr-2 text-amber-500"></i> Password
                        </label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required
                                class="input-focus w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:border-amber-500 transition duration-300 pl-10"
                                placeholder="••••••••">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-black bg-amber-500 hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i> Sign in
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-6 text-center text-white">
                <p class="text-sm">
                    &copy; 2023 Raka POS. All rights reserved.
                </p>
            </div>
        </div>
    </div>
@endsection
