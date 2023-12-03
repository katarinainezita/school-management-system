<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Student') }}
        </h2>
    </x-slot>

    <div x-data="{ open: true }" class="flex flex-row h-full">
        @include('student.partials.sidebar')

        <div class="basis-4/5 grow w-full overflow-y-auto">

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <a href="{{ route('student.mycourse') }}"> Back</a>

                            <h1 class="text-4xl font-bold text-gray-800 mt-2">{{ $course->title }}</h1>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
