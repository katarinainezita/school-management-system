@props([
    'width' => 'w-full',
    'textSize' => 'text-lg',
    'fontWeight' => 'medium',
])

<div class="{{ $width }} {{ $textSize }} {{ $fontWeight }} text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    {{ $slot }}
</div>