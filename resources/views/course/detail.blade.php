<x-app-layout>

    <div class="relative min-h-[22rem] bg-blue-100 border-2 px-10 py-14">
        @include('course.partials.edit-header', ['mode' => 'detail'])
    </div>

    @include('course.partials.summary-card', ['mode' => 'detail'])

    <div class="border-x-2 px-10 py-14">
        <div class="flex flex-col w-[60%]">
            {{-- Description --}}
            <div class="mb-10">
                @include('course.partials.edit-description', ['mode' => 'detail'])
            </div>

            {{-- Modules --}}
            <div class="mb-10">
                @include('course.partials.edit-modules-list', ['mode' => 'detail'])
            </div>

            {{-- Reviews --}}
            <div class="mb-10">
                @include('course.partials.edit-review', ['mode' => 'detail'])
            </div>
        </div>
    </div>
</x-app-layout>