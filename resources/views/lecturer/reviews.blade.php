<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lecturer\'s Courses') }}
        </h2>
    </x-slot>

    <div x-data="{ open: true }" class="flex flex-row h-full">
        @include('lecturer.partials.sidebar')

        <div class="basis-4/5 grow w-full overflow-y-auto">
            <div class="py-12 ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
