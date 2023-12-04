<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div x-data="{ open: true }" class="flex flex-row h-full">
        @include('admin.partials.sidebar')

        <div class="basis-4/5 grow w-full overflow-y-auto">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            @if (session('status'))
                                @if (session('status') == 'success')
                                    <x-success-alert> Course has been verified </x-success-alert>
                                @endif
                                @if (session('status') == 'fail')
                                    <x-warning-alert> Failed to verify course </x-warning-alert>
                                @endif
                            @endif

                            @if (count($courses) > 0)
                                <h1 class="font-bold text-2xl text-red-500 mt-5">Available Courses</h1>
                                <div class="grid grid-cols-3 gap-7 mt-10 justify-between">
                                    @foreach ($courses as $course)

                                        <div class="w-fit mb-5">
                                            <x-course-card :course="$course"></x-course-card>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-dashboard-layout>
