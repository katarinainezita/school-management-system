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

                            <p class="mt-1 font-semibold text-blue-500">By : {{ $course->lecturer->name }}</p>

                            <div class="flex gap-1 mt-2 items-center">
                                <x-badge
                                    class="bg-blue-200 text-blue-500 rounded-md font-bold">{{ $course->category }}</x-badge>

                                <x-badge
                                    class="bg-pink-200 text-pink-500 rounded-md font-bold">{{ $course->level }}</x-badge>
                            </div>

                            <div class="mt-10">
                                <h1 class="text-2xl font-semibold text-gray-800">About this course</h1>

                                <p class="text-lg text-justify mt-2 font-medium text-gray-800">
                                    {{ $course->description }}
                                </p>
                            </div>

                            <div class="mt-10">
                                <h1 class="text-2xl font-semibold text-gray-700">This course have <span
                                        class="text-blue-500 font-bold">
                                        {{ count($course->modules) }}</span> modules</h1>

                                <div id="accordion-color" class="mt-4" data-accordion="collapse"
                                    data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                                    @foreach ($course->modules as $module)
                                        <h2 id="accordion-color-heading-{{ $loop->index }}">
                                            <button type="button"
                                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                                data-accordion-target="#accordion-color-body-{{ $loop->index }}"
                                                aria-expanded="true" aria-controls="accordion-color-body-1">
                                                <div class="flex flex-col gap-2">
                                                    <h1 class="text-lg font-semibold text-left">{{ $module->title }}
                                                    </h1>
                                                    <p class="text-left">Module {{ $module->order }} :
                                                        {{ count($module->sections) }}
                                                        Section
                                                    </p>
                                                </div>

                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-color-body-{{ $loop->index }}" class="hidden my-2"
                                            aria-labelledby="accordion-color-heading-{{ $loop->index }}">
                                            <div class="flex flex-col gap-2 p-4 bg-white shadow border-2 rounded-lg">
                                                @foreach ($module->sections as $section)
                                                    <div
                                                        class="bg-slate-100 border-2 p-6 rounded-lg flex justify-between items-center">
                                                        <div>
                                                            <h1 class="text-md font-medium text-gray-800 mb-2">
                                                                {{ $section->title }}</h1>
                                                            <x-badge
                                                                class="text-yellow-600 bg-yellow-200 font-semibold">
                                                                @if ($section->content_type == 'App\Models\Article')
                                                                    Article
                                                                @elseif ($section->content_type == 'App\Models\Video')
                                                                    Video
                                                                @elseif ($section->content_type == 'App\Models\Quiz')
                                                                    Quiz
                                                                @endif
                                                            </x-badge>
                                                        </div>

                                                        <a href="#"
                                                            class="bg-blue-500 text-white font-bold px-4 py-2 hover:ring-2 hover:bg-blue-500 rounded-lg flex items-center gap-2">
                                                            Learn
                                                        </a>

                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach


                                </div>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
