<x-app-layout>
    <div class="relative" x-data="{openSidebar:true}">
        {{-- sidebar --}}
        @include('course.partials.sidebar')

        {{-- content --}}
        <div :class="openSidebar? 'w-[75%]' : 'w-[100%]'">
            @if ($sectionSelected->isArticle())
                @include('course.partials.article')
            @elseif ($sectionSelected->isVideo())
                @include('course.partials.video')
            @elseif ($sectionSelected->isQuiz())
                @include('course.partials.quiz')
            @endif

            {{-- discussion --}}
            @include('course.partials.discussion')            
        </div>
    </div>
</x-app-layout>