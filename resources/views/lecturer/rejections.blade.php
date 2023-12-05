<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lecturer\'s Courses') }}
        </h2>
    </x-slot>

    <div x-data="{ open: true }" class="flex flex-row h-full">
        @include('lecturer.partials.sidebar')

        <div class="basis-4/5 grow w-full overflow-y-auto">
            <div class="py-12 ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <x-table>
                                <x-slot name="header">
                                    <th scope="col" class="px-6 py-3">
                                        Course Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Rejected Messages
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                </x-slot>

                                <x-slot name="data">
                                @foreach ($datas as $course)
                                @foreach ($course->rejections as $data)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        <a href="{{ route('course.edit', ['slug' => $course->slug]) }}">{{ $data->course->title }}</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->message }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->created_at }}
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                                </x-slot>
                            </x-table>

                            {{-- page slider --}}
                            <div class="flex items-center justify-center w-full">
                                <a href="{{ route('lecturer.draft-courses', ['page' => $page-1]) }}">
                                    <x-button-slide></x-button-slide>
                                </a>
                                <h1 class="me-2">{{ $page }}</h1>
                                <a href="{{ route('lecturer.draft-courses', ['page' => $page+1]) }}">
                                    <x-button-slide class="rotate-180"></x-button-slide>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
