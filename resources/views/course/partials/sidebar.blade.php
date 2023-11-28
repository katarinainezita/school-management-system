<div x-show="!openSidebar" class="realtive h-full w-full">
    <a x-on:click="openSidebar=true" class="cursor-pointer">
        <img src="{{ asset('storage/img/assets/arrow-down-icon.png') }}" alt="arrow-icon" class="fixed top-1/2 right-5 rotate-90 w-[20px]">
    </a>
</div>
<aside id="separator-sidebar" aria-label="Sidebar" class="fixed right-[15px] w-[25%] h-[80%] border-l" x-show="openSidebar">
    <div class="flex p-3 border-b bg-white">
        <div class="relative w-full">
            <h1 class="text-md font-semibold">Course content</h1>
            <a x-on:click="openSidebar=false" class="cursor-pointer"><img src="{{ asset('storage/img/assets/cross-icon.png') }}" alt="cross-icon" class="absolute top-0 right-0 w-[20px]"></a>
        </div>
    </div>
    <div class="h-full overflow-y-scroll bg-white dark:bg-gray-800">
        <ul>
            @foreach ( $course->modules as $module )
            <li x-data="{openModule:false}">
                <a x-on:click="openModule = !openModule" class="flex p-3 border-b cursor-pointer">
                    <div class="relative w-full">
                        {{-- module title --}}
                        <h1 class="text-md font-semibold">Module {{ $module->order }}: {{ $module->title }}</h1>

                        {{-- num of section --}}
                        <h3 class="text-sm font-normal text-slate-400">{{ $module->numOfSections() }} section</h3>

                        {{-- arrow logo --}}
                        <img src="{{ asset('storage/img/assets/arrow-down-icon.png') }}" alt="arrow-icon" class="absolute top-0 right-0 w-[20px]" :class="openModule? 'rotate-180' : ''">
                    </div>
                </a>

                {{-- section --}}
                <div x-show="openModule">
                    <ul>
                        @foreach($module->sections as $section)
                        <li>
                            <a href="{{ route('course.learn', ['slug' => $course->slug, 'module_order' => $module->order, 'section_order' => $section->order]) }}" class="flex p-3 border-b cursor-pointer">
                                <div class="relative w-full ml-3">
                                    {{-- section title --}}
                                    <h1 class="text-sm font-normal">{{ $section->order }}. {{ $section->title }}</h1>
            
                                    {{-- type of section --}}
                                    {{-- article --}}
                                    @if(!$section->isArticle())
                                    <div class="flex ml-3">
                                        <img src="{{ asset('storage/img/assets/articles-icon.png') }}" alt="article-icon" class="w-[15px] h-fit me-2">
                                        <h3 class="text-xs font-thin">Article</h3>
                                    </div>
                                    {{-- video --}}
                                    @elseif($section->isVideo())
                                    <div class="flex ml-3">
                                        <img src="{{ asset('storage/img/assets/video-icon.png') }}" alt="video-icon" class="w-[15px] h-fit me-5">
                                        <h3 class="text-xs font-normal">Video</h3>
                                    </div>
                                    @elseif($section->isQuiz())
                                    <div class="flex ml-3">
                                        <img src="{{ asset('storage/img/assets/quiz-icon.png') }}" alt="quiz-icon" class="w-[15px] h-fit me-5">
                                        <h3 class="text-xs font-normal">Quiz</h3>
                                    </div>
                                    @endif
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</aside>
