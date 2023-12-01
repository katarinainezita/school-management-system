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
                            <h1 class="text-gray-900 font-semibold text-xl p-4">My Course</h1>
                            <div class="m-4">
                                <x-search width="full" route="student.mycourse"></x-search>
                            </div>

                            @if (Request::get('query'))
                                <div class="flex items-center gap-4 text-blue-500 mb-4">
                                    <div class="ml-4 text-lg">Hasil pencarian : {{ Request::get('query') }} </div>
                                    <a class="font-bold p-2 bg-gray-200 text-gray-700 rounded-lg"
                                        href="{{ route('student.mycourse') }}">Reset</a>
                                </div>
                            @endif

                            <x-layout-card>
                                @foreach ($courses as $course)
                                    <x-course-card :course="$course">

                                    </x-course-card>
                                @endforeach
                            </x-layout-card>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
