@props ([
    'bgColor' => 'black',
    'textColor' => 'white',
])

<button type="button" class="text-{{ $textColor }} bg-{{ $bgColor }}-400 hover:bg-{{ $bgColor }}-500 focus:outline-none focus:ring-4 focus:ring-{{ $bgColor }}-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-{{ $bgColor }}-900"> {{ $slot }} </button>
