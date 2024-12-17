<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg overflow-hidden flex">
            <!-- Left Side: Background Image and Logo -->
            <div class="w-1/2 bg-cover bg-center relative" style="background-image: url('/images/background.jpg');">
                <div class="absolute inset-0 bg-black opacity-30"></div>
                <div class="relative flex items-center justify-center h-full">
                    <div class="text-center">
                        <img src="/images/logo.png" alt="Logo" class="mx-auto mb-4 w-20 h-20">
                        <h1 class="text-3xl font-semibold text-white">TREKTROVE</h1>
                    </div>
                </div>
            </div>
            
            <!-- Right Side: Slot Content for Login Form -->
            <div class="w-1/2 p-10">
                <h2 class="text-2xl font-semibold text-green-700 mb-4">Login</h2>
                <p class="text-gray-600 mb-8">Don't have an account? <a href="{{ route('register') }}" class="text-green-700 font-medium">Create an account</a></p>
                
                <!-- Slot for the Form -->
                <div class="w-full">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
