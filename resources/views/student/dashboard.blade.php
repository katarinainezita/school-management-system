<x-app-layout>
    @php
        $showModal = false; // Set the initial value of $showModal
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
                                <h1 class="text-2xl font-bold">{{ __('Course yang tersedia') }}</h1>

                                <button x-on:click="$dispatch('open-modal', 'cardModal')"> <x-bxs-cart
                                        class="w-10 h-10 hover:cursor-pointer" />

                                    @if ($cartItemsArray['data'] ?? false)
                                        <div class="rounded-full bg-red-500 text-white">
                                            {{ count($cartItemsArray['data']) }}
                                    @endif

                            </div>
                            </button>
                        </div>

                        <div class="mb-4 mx-4">
                            <x-search width="full" route="student.dashboard"></x-search>
                        </div>

                        @if (Request::get('query'))
                            <div class="flex items-center gap-4 text-blue-500">
                                <div class="ml-4 text-lg">Hasil pencarian : {{ Request::get('query') }} </div>
                                <a class="font-bold p-2 bg-gray-200 text-gray-700 rounded-lg"
                                    href="{{ route('student.dashboard') }}">Reset</a>
                            </div>
                        @endif


                        <x-modal name="cardModal" :show="$showModal" maxWidth="2xl">

                            <div class="p-4">
                                <h2 class="text-2xl font-bold mb-4">Keranjang</h2>

                                @foreach ($cartItemsArray ?? [] as $items)
                                    <div class="flex flex-col gap-2">
                                        @if ($items)
                                            @foreach ($items as $item)
                                                <x-cart-card :item="$item"></x-cart-card>
                                            @endforeach
                                        @else
                                            <div class="text-blue-500 font-medium text-lg text-center">Keranjang
                                                kamu kosong...</div>
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
                                                class="p-2 bg-blue-200 text-blue-500 rounded-lg">
                                                <div class="flex items-center gap-2 w-full">
                                                    <x-bxs-cart class="w-5 h-5 hover:cursor-pointer" />
                                                    <span>Tambah</span>
                                                </div>
                                            </x-form-button>
                                            <x-form-button method="PATCH" :action="route('cart.checkout', ['course' => $course->id])"
                                                class="p-2 w-full bg-blue-500 text-white rounded-lg">
                                                <div class="flex items-center gap-2 w-full">
                                                    <span>Beli Langsung</span>
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
