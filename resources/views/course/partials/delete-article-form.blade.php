<div class="flex justify-end" x-data="{ openModal: false }">
    <button x-on:click="openModal=!openModal" padding="">
        <img class="absolute top-[140px] right-[20px] w-[20px]" src="{{ asset('storage/img/assets/minus-icon.png') }}">
    </button>
    <template x-if="openModal">
        <x-modal name="Delete Article" show="true">
            <form action="{{ route('article.delete') }}" method="POST">
                @csrf
                @method('PATCH')
  
                <input type="hidden" name="section_id" value="{{ $id }}">
  
                <div class="p-5">
                    <div class="mb-6">
                        <x-label-form for="text" textSize="text-lg" fontWeight="font-bold">Article
                            Content</x-label-form>
                        <p>Are you sure you want to delete this article?</p>
                    </div>
  
                    <div class="flex justify-between">
                        <x-button variable="openModal">Cancel</x-button>
                        <x-button type="submit">Delete Article</x-button>
                    </div>
                </div>
            </form>
        </x-modal>
    </template>
  </div>
  