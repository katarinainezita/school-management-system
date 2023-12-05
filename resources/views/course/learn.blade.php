<x-app-layout>
    <div class="relative" x-data="{ openSidebar: true }">
        {{-- message --}}
        <div class="absolute top-[10px] w-full">
            @if (session('status'))
                <div class="flex items-center justify-center">
                    @if (session('status') == 'success')
                        <x-success-alert>{{ session('message') }}</x-success-alert>
                    @elseif (session('status') == 'fail')
                        <x-warning-alert>{{ session('message') }}</x-warning-alert>
                    @endif
                </div>
            @endif
    
            @if($errors->any())
                <div class="flex items-center justify-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><x-warning-alert>{{ $error }}</x-warning-alert></li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        {{-- sidebar --}}
        @include('course.partials.sidebar')

        {{-- content --}}
        <div :class="openSidebar ? 'w-[75%]' : 'w-[100%]'">
            @if ($section->isArticle())
                @include('course.partials.article')
            @elseif ($section->isVideo())
                @include('course.partials.video')
            @elseif ($section->isQuiz())
                @include('course.partials.quiz')
            @endif

            {{-- discussion --}}

            <div class="p-6">
                @include('student.partials.discussion-student')
            </div>

        </div>
    </div>
</x-app-layout>
