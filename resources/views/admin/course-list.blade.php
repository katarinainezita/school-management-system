<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div x-data="{ open: true }" class="flex flex-row h-full">
        @include('admin.partials.sidebar')

        <div class="basis-4/5 grow w-full overflow-y-auto">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            @if (session('status'))
                                @if (session('status') == 'success')
                                    <x-success-alert> Course has been verified </x-success-alert>
                                @endif
                                @if (session('status') == 'fail')
                                    <x-warning-alert> Failed to verify course </x-warning-alert>
                                @endif
                            @endif

                            @if (count($unverifiedCourses) > 0)
                                <h1 class="font-bold text-2xl text-red-500 mt-5">Unverified Courses</h1>
                                <div class="grid grid-cols-3 gap-7 mt-10 justify-between">
                                    @foreach ($unverifiedCourses as $course)
                    
                                        <div class="w-fit mb-5">
                                            <x-course-card :course="$course" >
                                                <div class="flex justify-between">
                                                    <a href="#"
                                                        class="px-3 py-2 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Detail
                                                    </a>
                                                    <form method="POST" action="{{ route('course.verify') }}">
                                                        @method('PATCH')
                                                        @csrf
                                                        <input type="hidden" name="course_id"
                                                            value="{{ $course->id }}">
                                                        <button type="submit"
                                                            class="px-3 py-2 text-sm font-medium text-center text-white bg-orange-700 rounded-lg hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            Verify
                                                        </button>
                                                    </form>
                                                </div>
                                            </x-course-card>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <hr class="h-px my-10 bg-gray-200 border-0 dark:bg-gray-700">

                            @if (count($verifiedCourses) > 0)
                                <h1 class="font-bold text-2xl text-blue-500 mt-5">Verified Courses</h1>
                                <div class="grid grid-cols-3 gap-7 mt-10 justify-between">
                                    @foreach ($verifiedCourses as $course)
                                        <div class="w-fit mb-10">
                                            <x-course-card :course="$course"></x-course-card>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-dashboard-layout>
