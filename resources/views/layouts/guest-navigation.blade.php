<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 h-full">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 h-full sm:px-6 lg:px-8">
        <div class="flex justify-between h-full">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>
            </div>

            {{-- login and register button --}}
            <div class="flex items-center">
                <a href="{{ route('login') }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</a>

                <a href="{{ route('register') }}" type="button" class="py-2.5 px-5 me-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Register</a>

            </div>
        </div>
    </div>
</nav>
