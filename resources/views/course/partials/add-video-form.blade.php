<div class="flex justify-end" x-data="{ openModal: false }">
  <x-list-item-button variable="openModal" padding="" type="submit">
      <div class="flex items-center align-center justify-center h-12 border-2 border-dashed">
          <img src="{{ asset('storage/img/assets/plus-icon.png') }}" alt="" class="h-7">
          Add Video Link
      </div>
  </x-list-item-button>
  <template x-if="openModal">
      <x-modal name="Add Video" show="true">
          <form action="{{ route('video.store') }}" method="POST">
              @csrf

              <input type="hidden" name="section_id" value="{{ $sectionSelected->id }}">

              <div class="p-5">
                  <div class="mb-6">
                      <x-label-form for="video" textSize="text-lg" fontWeight="font-bold">Video URL</x-label-form>
                      <x-text-input class="w-full" type="text" id="video" name="video"
                          placeholder="Video URL" required></x-text-input>
                  </div>

                  <div class="flex justify-between">
                      <x-button variable="openModal">Cancel</x-button>
                      <x-button type="submit">Add Video</x-button>
                  </div>
              </div>
          </form>
      </x-modal>
  </template>
</div>
