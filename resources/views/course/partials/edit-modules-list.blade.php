<div>
    <h1 class="text-xl font-semibold font-inter mb-3">There are {{ $course->modules->count() }} modules in this course:</h1>

    {{-- num of articles, video, and quiz --}}
    <div class="grid"></div>

    {{-- modules list --}}
    <x-list-group>
        <div class="px-5 py-2">
            {{-- each modules --}}
            @foreach($course->modules as $module)
                <div class="relative" x-data="{ spanSection:false, editModuleTitle:false, deleteModule:false}">
                    @if($mode == 'edit')
                    {{-- delete button --}}
                    <button class="absolute top-0 right-0 w-[17px] h-fit" x-on:click="deleteModule = !deleteModule">
                        <img src="{{ asset('/storage/img/assets/minus-icon.png') }}" alt="delete-icon">
                    </button>
                    <template x-if="deleteModule">
                        <x-modal name="Add Courses" show="true">
                            <form action="{{ route('module.delete', ['slug' => $course->slug, 'module_order' => $module->order]) }}" method="post">
                                @csrf
                                @method('delete')
                                <div class="p-5">
                                    <h1 class="mb-5">Are you sure you want to delete this module? All section in the module will also deleted.</h1>

                                    <input type="text" class="hidden" value="{{ $module->order }}">

                                    <div class="flex justify-between">
                                        <x-button variable="deleteModule">cancel</x-button>
                                        <x-button type="submit">delete</x-button>
                                    </div>
                                </div>
                            </form>
                        </x-modal>
                    </template>

                    {{-- edit button --}}
                    <button class="absolute top-0 right-[25px] w-[17px] h-fit" x-on:click="editModuleTitle = !editModuleTitle">
                        <img src="{{ asset('/storage/img/assets/pencil-icon.jpg') }}" alt="edit-icon">
                    </button>
                    @endif

                    {{-- update button --}}
                    <x-list-item-button variable="spanSection">
                        {{-- module name --}}
                        <h1 class="text-lg" x-show="!editModuleTitle">{{ $module->title }}</h1>                        

                        @if($mode == 'edit')
                        {{-- edit title form --}}
                        <form method="post" action="{{ route('module.edit.title', ['slug' => $course->slug, 'module_id' => $module->id]) }}" x-show="editModuleTitle">
                            @csrf
                            @method('patch')
                            <x-input-dashed id="module_title" name="module_title" textSize="text-lg" value="{{ $module->title }}"></x-input-dashed>
                        </form>
                        @endif

                        {{-- module order and num of sections --}}
                        <h2 class="text-xs font-light text-gray-600">Module {{ $module->order }} <span class="font-extrabold">&#183;</span> {{ $module->numOfSections() }} sections</h2>

                        {{-- arrow symbol --}}
                        <img :class="spanSection? 'rotate-180' : ''" src="{{ asset('/storage/img/assets/arrow-down-icon.png') }}" alt="arrow-icon" class="absolute right-2 top-7 w-[20px]">
                    </x-list-item-button>
                    
                    
                    {{-- sections --}}
                    <div x-show="spanSection" class="ms-5">
                        @foreach ($module->sections as $section)
                        <div class="relative" x-data="{editSection:false, deleteSection:false}">

                            @if($mode == 'edit')
                            {{-- edit button --}}
                            <button class="absolute top-2 right-5 w-[10px] h-fit" x-on:click="editSection = !editSection">
                                <img src="{{ asset('/storage/img/assets/pencil-icon.jpg') }}" alt="delete-icon">
                            </button>
                            <template x-if="editSection">
                                <x-modal name="Edit Section" show="true">
                                    <form action="{{ route('section.edit', ['slug' => $course->slug, 'module_id' => $module->id, 'section_id' => $section->id]) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <div class="p-5">
                                            {{-- Title --}}
                                            <div class="mb-6">
                                                <x-label-form for="title" textSize="text-lg" fontWeight="font-bold">Section Title</x-label-form>
                                                <x-input-form type="text" id="title" name="title" placeholder="" required="required"></x-input-form>
                                            </div>
        
                                            <div class="flex justify-between">
                                                <x-button variable="editSection">cancel</x-button>
                                                <x-button type="submit">edit</x-button>
                                            </div>
                                        </div>
                                    </form>
                                </x-modal>
                            </template>

                            {{-- delete button --}}
                            <button class="absolute top-2 right-0 w-[10px] h-fit" x-on:click="deleteSection = !deleteSection">
                                <img src="{{ asset('/storage/img/assets/minus-icon.png') }}" alt="delete-icon">
                            </button>
                            <template x-if="deleteSection">
                                <x-modal name="Add Courses" show="true">
                                    <form action="{{ route('section.delete', ['slug' => $course->slug, 'module_id' => $module->id, 'section_order' => $section->order]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="p-5">
                                            <h1 class="mb-5">Are you sure you want to delete this section?</h1>
        
                                            <div class="flex justify-between">
                                                <x-button variable="deleteSection">cancel</x-button>
                                                <x-button type="submit">delete</x-button>
                                            </div>
                                        </div>
                                    </form>
                                </x-modal>
                            </template>
                            @endif

                            <a href="{{ route('course.learn', ['slug' => $course->slug, 'module_order' => $module->order, 'section_order' => $section->order]) }}">
                                <x-list-item-button bordered="border-none" margin='' padding='px-4'>
                                    {{-- symbol --}}
                                    <div class="flex">
                                        @if($section->isArticle())
                                        <img src="{{ asset('storage/img/assets/articles-icon.png') }}" alt="article-icon" class="w-[17px] h-fit me-3">
                                        @elseif($section->isVideo())
                                        <img src="{{ asset('storage/img/assets/video-icon.png') }}" alt="article-icon" class="w-[17px] h-fit me-3">
                                        @elseif($section->isQuiz())
                                        <img src="{{ asset('storage/img/assets/quiz-icon.png') }}" alt="article-icon" class="w-[17px] h-fit me-3">
                                        @endif
                                        <h1 class="text-sm">{{ $section->title }}</h1>
                                    </div>
                                </x-list-item-button>
                            </a>
                        </div>
                        @endforeach

                        @if($mode == 'edit')
                        @include('course.partials.add-section-form')
                        @endif
                    </div>
                </div>                 
            @endforeach

            @if($mode == 'edit')
            @include('course.partials.add-module-form')
            @endif
        </div>
    </x-list-group>
</div>
