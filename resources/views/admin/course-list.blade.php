<x-admin.layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status'))
                        @if(session('status') == 'success')
                        <x-success-alert> Course has been verified </x-success-alert>
                        @endif
                        @if(session('status') == 'fail')
                        <x-warning-alert> Failed to verify course </x-warning-alert>
                        @endif
                    @endif

                    @if (count($unverifiedCourses) != 0)
                        <h1 class="font-bold text-2xl text-red-500 mt-5">Unverified Courses</h1>
                        <div class="grid grid-cols-3 gap-7 mt-10 justify-between">
                            @foreach ($unverifiedCourses as $course)
                                <div class="w-fit mb-5">
                                    <x-course-card :id="$course->id" :title="$course->title" :category="$course->category" :level="$course->level" :image="$course->photo" :description="$course->description" :verified="$course->verified"></x-course-card>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <hr class="h-px my-10 bg-gray-200 border-0 dark:bg-gray-700">

                    @if (count($verifiedCourses) != 0)
                        <h1 class="font-bold text-2xl text-blue-500 mt-5">Verified Courses</h1>
                        <div class="grid grid-cols-3 gap-7 mt-10 justify-between">
                            @foreach ($verifiedCourses as $course)
                                <div class="w-fit mb-10">
                                    <x-course-card :id="$course->id" :title="$course->title" :category="$course->category" :level="$course->level" :image="$course->photo" :description="$course->description" :verified="$course->verified"></x-course-card>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
