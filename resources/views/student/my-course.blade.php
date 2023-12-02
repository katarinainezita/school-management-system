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
                                <div class="flex items-center gap-4 font-semibold text-blue-500 mb-4">
                                    <div class="ml-4 text-lg">Hasil pencarian : {{ Request::get('query') }} </div>
                                    <a class="text-red-500 underline font-semibold"
                                        href="{{ route('student.mycourse') }}">Reset</a>
                                </div>
                            @endif

                            @if (Request::get('level') || Request::get('category'))
                                <div class="flex items-center gap-2 mx-4 mb-4">
                                    @if (Request::get('category'))
                                        <x-badge
                                            class="bg-blue-100 text-blue-500 px-2 font-semibold">{{ Request::get('category') }}</x-badge>
                                    @endif
                                    @if (Request::get('level'))
                                        <x-badge
                                            class="bg-pink-100 text-pink-500 px-2 font-semibold">{{ Request::get('level') }}</x-badge>
                                    @endif

                                    <a class="text-red-500 underline font-semibold"
                                        href="{{ route('student.mycourse') }}">Reset Filter</a>
                                </div>
                            @endif

                            <x-layout-card>
                                @foreach ($courses as $course)
                                    <x-course-card :course="$course">
                                        <x-button>Mulai Belajar</x-button>
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
