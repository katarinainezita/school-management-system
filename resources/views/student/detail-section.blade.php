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
                            <a href="{{ route('student.detail', ['slug' => $course->slug]) }}"><i
                                    data-feather="arrow-left-circle"></i></a>

                            <h1 class="text-2xl font-bold text-gray-800 mt-2">Section {{ $section->order }}
                                :{{ $section->title }}</h1>

                            <div class="mt-4 flex items-center gap-2">
                                <span class="font-semibold text-lg">Content</span>
                                <x-badge class="text-yellow-600 bg-yellow-200 font-semibold">
                                    @if ($section->isArticle())
                                        Article
                                    @elseif ($section->isVideo())
                                        Video
                                    @elseif ($section->isQuiz())
                                        Quiz
                                    @endif
                                </x-badge>
                            </div>

                            <div class="mt-4">
                                @if ($section->isArticle())
                                    <p>{{ $section->article->text ?? 'Article is empty...' }}</p>
                                @elseif ($section->isVideo())
                                    <iframe width="600" height="400" src="{{ $section->video->video }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                @elseif ($section->isQuiz())
                                    Quiz
                                @endif
                            </div>

                            @include('student.partials.discussion-student')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
