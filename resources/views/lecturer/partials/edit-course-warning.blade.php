<template x-if="openModal">
    <x-modal name="Edit Course Warning" show="true">
        <form action="{{ route('course.draft', ['slug' => $course->slug]) }}" method="post">
            @csrf
            @method('patch')
            <div class="p-5">
                {{-- Warning --}}
                <div class="mb-6">
                    <x-label-form for="title" textSize="text-lg" fontWeight="font-bold">Warning</x-label-form>
                    <p>Are you sure you want to edit this course? The course status will changed to draft.</p>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Yes</button>
                </div>
            </div>
        </form>
    </x-modal>
</template>