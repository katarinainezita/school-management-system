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
    <body class="font-sans antialiased">
        <div class="h-screen bg-gray-100 dark:bg-gray-900">
            <div class="h-[12%]">
                @auth
                    @if(Auth::user()->isAdmin())
                        @include('layouts.admin-navigation')
                    @endif
                    @if(Auth::user()->isStudent())
                        @include('layouts.student-navigation')
                    @endif
                    @if(Auth::user()->isLecturer())
                        @include('layouts.lecturer-navigation')
                    @endif
                @endauth
                @guest
                    @include('layouts.guest-navigation')
                @endguest
            </div>

            <div class="h-[12%]">
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="flex items-center bg-white dark:bg-gray-800 border-y-2 h-full">
                        <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif
            </div>

            <!-- Page Content -->
            <main class="h-[76%]">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>