<div class="flex justify-end" x-data="{ openModal: false }">
    <x-list-item-button bordered="border-none" margin='' variable="openModal" padding="" type="submit">
        <div class="flex items-center align-center justify-center h-7 border-2 border-dashed">
            <img src="{{ asset('storage/img/assets/plus-icon.png') }}" alt="" class="h-4">
        </div>
    </x-list-item-button>
    <template x-if="openModal">
        <x-modal name="Add Courses" show="true">
            <form action="{{ route('section.new', ['slug' => $course->slug, 'module_id' => $module->id, 'section']) }}" method="post">
                @csrf
                @method('post')
                
                <div class="p-5">
                    {{-- Title --}}
                    <div class="mb-6">
                        <x-label-form for="title" textSize="text-lg" fontWeight="font-bold">Section Title</x-label-form>
                        <x-input-form type="text" id="title" name="title" placeholder="" required="required"></x-input-form>
                    </div>

                    {{-- Type --}}
                    <div class="mb-6">
                        <x-label-form for="type" textSize="text-lg" fontWeight="font-bold">Content Type</x-label-form>
                        <x-select-input-form id="type" name="type">
                            <option selected></option>
                            <option value="Article">Article</option>
                            <option value="Video">Video</option>
                            <option value="Test">Quiz</option>
                        </x-select-input-form>
                    </div>

                    <div class="flex justify-between">
                        <x-button variable="openModal">cancel</x-button>
                        <x-button type="submit">create</x-button>
                    </div>
                </div>
            </form>
        </x-modal>
    </template>
</div>