<template x-if="openModal">
    <x-modal name="Add Courses" show="true">
        <form action="{{ route('course.reject') }}" method="post">
            @csrf
            <div class="p-5">
                {{-- Notes --}}
                <div class="mb-6">
                    <x-label-form for="notes" textSize="text-lg" fontWeight="font-bold">Notes</x-label-form>
                    <x-input-form type="notes" id="notes" name="notes" placeholder="" required="required"></x-input-form>
                </div>

                <input type="hidden" id="course_id" name="course_id" value="{{ $course->id }}">

                <div class="flex justify-end">
                    <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Send</button>
                </div>
            </div>
        </form>
    </x-modal>
</template>