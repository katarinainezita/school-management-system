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
                            <h1 class="font-bold text-2xl text-blue-500 mt-5">Available Course</h1>
                            <div class="grid grid-cols-3 gap-7 mt-10 justify-between">
                                @foreach ($datas as $course)
                                    <div class="w-fit mb-5">
                                        <x-course-card :course="$course">
                                            <div class="flex justify-between" x-data="{openModal:false}">
                                                <button x-on:click="openModal=!openModal" class="px-3 py-2 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Edit
                                                </button>
                                                @include('lecturer.partials.edit-course-warning')
                                            </div>
                                        </x-course-card>
                                    </div>
                                @endforeach
                            </div>

                            {{-- page slider --}}
                            <div class="flex items-center justify-center w-full">
                                <a href="{{ route('lecturer.courses', ['page' => $page-1]) }}">
                                    <x-button-slide></x-button-slide>
                                </a>
                                <h1 class="me-2">{{ $page }}</h1>
                                <a href="{{ route('lecturer.courses', ['page' => $page+1]) }}">
                                    <x-button-slide class="rotate-180"></x-button-slide>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
