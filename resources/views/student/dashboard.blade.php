<x-app-layout>
    @php
        $showModal = false;
    @endphp
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Student') }}
        </h2>
    </x-slot>

    <div x-data="{ open: true }" class="flex flex-row h-full">
        @include('student.partials.sidebar')


        <div class="basis-4/5 grow w-full overflow-y-auto">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="px-4 text-gray-900 dark:text-gray-100">
                            <div class="flex justify-between items-center p-4 mb-4">
                                <h1 class="text-2xl font-bold">{{ __('Course') }}</h1>

                                <button x-on:click="$dispatch('open-modal', 'cardModal')">
                                    <i data-feather="shopping-cart"></i>
                                    @if ($cartItemsArray['data'] ?? false)
                                        <div class="rounded-full bg-red-500 text-white">
                                            {{ count($cartItemsArray['data']) }}
                                        </div>
                                    @endif
                                </button>
                            </div>

                            <div class="mb-4 mx-4">
                                <x-search width="full" route="student.dashboard"></x-search>
                            </div>

                            @if (Request::get('query'))
                                <div class="flex items-center gap-4 font-semibold text-blue-500">
                                    <div class="ml-4 text-lg">Hasil pencarian : {{ Request::get('query') }} </div>
                                    <a class="text-red-500 underline font-semibold"
                                        href="{{ route('student.dashboard') }}">Reset</a>
                                </div>
                            @endif

                            @if (Request::get('level') || Request::get('category'))
                                <div class="flex items-center gap-2 mx-4">
                                    @if (Request::get('category'))
                                        <x-badge
                                            class="bg-blue-100 text-blue-500 px-2 font-semibold">{{ Request::get('category') }}</x-badge>
                                    @endif
                                    @if (Request::get('level'))
                                        <x-badge
                                            class="bg-pink-100 text-pink-500 px-2 font-semibold">{{ Request::get('level') }}</x-badge>
                                    @endif

                                    <a class="text-red-500 underline font-semibold"
                                        href="{{ route('student.dashboard') }}">Reset Filter</a>
                                </div>
                            @endif


                            <x-modal name="cardModal" :show="$showModal" maxWidth="2xl">
                                <div class="p-4">
                                    <h2 class="text-2xl font-bold mb-4">Cart</h2>

                                    @foreach ($cartItemsArray ?? [] as $items)
                                        <div class="flex flex-col gap-2">
                                            @if ($items)
                                                @foreach ($items as $item)
                                                    <x-cart-card :item="$item"></x-cart-card>
                                                @endforeach
                                            @else
                                                <div class="text-blue-500 font-medium text-lg text-center">Cart
                                                    empty...</div>
                                            @endif

                                        </div>
                                    @endforeach
                                </div>

                            </x-modal>


                            <div class="p-4">
                                <x-layout-card>
                                    @foreach ($courses as $course)
                                        <x-course-card :course="$course">
                                            <div class="flex items-center justify-between">
                                                <x-form-button :action="route('cart.add', ['course' => $course->id])"
                                                    class="px-4 py-2 bg-blue-200 text-blue-500 rounded-lg">
                                                    <div class="flex items-center gap-2 w-full">

                                                        <span>Add to Cart</span>
                                                    </div>
                                                </x-form-button>
                                                <x-form-button method="PATCH" :action="route('cart.checkout', ['course' => $course->id])"
                                                    class="px-4 py-2 w-full bg-blue-500 text-white rounded-lg">
                                                    <div class="flex items-center gap-2 w-full">
                                                        <span>Buy Course</span>
                                                    </div>
                                                </x-form-button>
                                            </div>

                                        </x-course-card>
                                    @endforeach
                                </x-layout-card>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
