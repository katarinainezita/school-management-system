<div class="flex justify-end" x-data="{ openModal: false }">
    <x-list-item-button variable="openModal" padding="" type="submit">
        <div class="flex items-center align-center justify-center h-12 border-2 border-dashed">
            <img src="{{ asset('storage/img/assets/plus-icon.png') }}" alt="" class="h-7">
        </div>
    </x-list-item-button>
    <template x-if="openModal">
        <x-modal name="Add Courses" show="true">
            <form action="{{ route('module.new', ['slug' => $course->slug]) }}" method="post">
                @csrf
                @method('post')
                
                <div class="p-5">
                    {{-- Title --}}
                    <div class="mb-6">
                        <x-label-form for="title" textSize="text-lg" fontWeight="font-bold">Module Title</x-label-form>
                        <x-input-form type="text" id="title" name="title" placeholder="" required="required"></x-input-form>
                    </div>

                    {{-- number of sections --}}
                    <div class="mb-6">
                        <x-label-form for="numOfSections" textSize="text-lg" fontWeight="font-bold">Number of sections:</x-label-form>
                        <x-input-number-form id='numOfSections' name="numOfSections"></x-input-number-form>
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