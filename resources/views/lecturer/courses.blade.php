<x-lecturer.layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lecturer\'s Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end" x-data="{ openModal: false }">
                        <button type="button" x-on:click="openModal=!openModal" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900"> Add Course </button>
                        <template x-if="openModal">
                            <x-modal name="Add Courses" show="true">
                                <form action="{{ route('course.new') }}" method="post">
                                    @csrf
                                    <div class="p-5">
                                        {{-- Title --}}
                                        <div class="mb-6">
                                            <x-label-form for="title" textSize="text-lg" fontWeight="font-bold">Title</x-label-form>
                                            <x-input-form type="text" id="title" name="title" placeholder="" required="required"></x-input-form>
                                        </div>

                                        {{-- Description --}}
                                        <div class="mb-6">
                                            <x-label-form for="Description" textSize="text-md" fontWeight="font-medium">Description</x-label-form>
                                            <x-text-area id='description' name="description" rows='5' placeholder="Description..."></x-text-area>
                                        </div>

                                        {{-- Category --}}
                                        <div class="mb-6">
                                            <x-label-form for="category" textSize="text-md" fontWeight="font-medium">Category</x-label-form>
                                            <x-select-input-form id='category' name="category">
                                                <option selected></option>
                                                <option value="Front End">Front End</option>
                                                <option value="Backend">Backend</option>
                                                <option value="IoT">IoT</option>
                                                <option value="Android">Android</option>
                                                <option value="iOs">iOs</option>
                                                <option value="Cybersecurity">Cybersecurity</option>
                                                <option value="Machine Learning">Machine Learning</option>
                                            </x-select-input-form>
                                        </div>

                                        {{-- Level --}}
                                        <div class="mb-6">
                                            <x-label-form for="level" textSize="text-md" fontWeight="font-medium">Level</x-label-form>
                                            <x-select-input-form id='level' name="level">
                                                <option selected></option>
                                                <option value="Dasar">Dasar</option>
                                                <option value="Pemula">Pemula</option>
                                                <option value="Menengah">Menengah</option>
                                                <option value="Mahir">Mahir</option>
                                            </x-select-input-form>
                                        </div>

                                        <div class="flex justify-end">
                                            <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </x-modal>
                        </template>
                    </div>

                    @if (count($courses) != 0)
                        <h1 class="font-bold text-2xl text-green-500 mt-5">Your Courses</h1>
                        <div class="grid grid-cols-3 gap-7 mt-10 justify-between">
                            @foreach ($courses as $course)
                                <div class="w-fit mb-5">
                                    <x-course-card :id="$course->id" :title="$course->title" :category="$course->category" :level="$course->level" :image="$course->photo" :description="$course->description" :verified="$course->verified">
                                        <div class="flex justify-between">
                                            <a href="#" class="px-3 py-2 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Detail
                                            </a>
                                        </div>
                                    </x-course-card>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-lecturer.layout>
