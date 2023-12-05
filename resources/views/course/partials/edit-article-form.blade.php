<div class="flex justify-end" x-data="{ openModal: false }">
  <x-list-item-button variable="openModal" padding="" type="submit">
      <div class="flex items-center align-center justify-center h-12 border-2 border-dashed">
          <img src="{{ asset('storage/img/assets/plus-icon.png') }}" alt="" class="h-7">
          Edit Article
      </div>
  </x-list-item-button>
  <template x-if="openModal">
      <x-modal name="Edit Article" show="true">
          <form action="{{ route('article.edit') }}" method="POST">
              @csrf
              @method('PATCH')

              <input type="hidden" name="section_id" value="{{ $id }}">

              <div class="p-5">
                  <div class="mb-6">
                      <x-label-form for="text" textSize="text-lg" fontWeight="font-bold">Article
                          Content</x-label-form>
                      <x-input-textarea-dashed value="{{ $article->text }}" type="text" id="text" name="text"
                          placeholder="Write your content" required></x-input-textarea-dashed>
                  </div>

                  <div class="flex justify-between">
                      <x-button variable="openModal">Cancel</x-button>
                      <x-button type="submit">Edit Article</x-button>
                  </div>
              </div>
          </form>
      </x-modal>
  </template>
</div>
