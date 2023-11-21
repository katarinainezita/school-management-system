@props ([
    'for' => '',
    'textSize' => 'text-sm',
    'fontWeight' => 'font-semibold',
])

<label for="{{ $for }}" class="{{ $textSize }} {{ $fontWeight }} block mb-2 text-gray-900 dark:text-white">{{ $slot }}</label>