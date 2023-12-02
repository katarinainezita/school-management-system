@props([
    'bgColor' => 'gray-100',
    'textColor' => 'gray-800',
    'textSize' => 'xs',
    'fontWeight' => 'medium',
    'class' => ''
])

<span class="{{ $bgColor }} {{ $textColor }} {{ $textSize }} {{ $fontWeight }} {{ $class }} me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300"> {{ $slot }} </span>