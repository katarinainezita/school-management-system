<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (count($courses) != 0)
                        <h1 class="font-bold text-2xl text-green-500 mt-5">Your Courses</h1>
                        <div class="grid grid-cols-3 gap-7 mt-10 justify-between">
                            @foreach ($courses as $course)
                                <div class="w-fit mb-5">
                                    <x-course-card :id="$course->id" :title="$course->title" :category="$course->category" :level="$course->level" :image="$course->photo" :description="$course->description" :verified="$course->verified">
                                        <div class="flex justify-between">
                                            <a href="#" class="px-3 py-2 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Detail
                                            </a>
                                        </div>
                                    </x-course-card>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
