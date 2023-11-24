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

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 h-[10%] border-y-2">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="h-[80%]">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
