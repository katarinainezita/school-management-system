@props([
    'id' => '',
    'name' => '',
    'value' => '',
    'rows' => 4,
    'textSize' => ''
])

<textarea rows="{{ $rows }}" id="{{ $id }}" name="{{ $name }}" class="{{ $textSize }} block p-2.5 w-full text-gray-900 bg-transparent rounded-lg border border-dashed border-black focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{ $value }}</textarea>