@props([
    'variable' => '',
    'bordered' => 'border-b',
    'margin' => 'my-3',
    'padding' => 'px-4 py-2',
    'type' => 'button',
])


<button x-on:click="{{ $variable }}=!{{ $variable }}" type="{{ $type }}" class="w-full {{ $padding }} {{ $margin }} font-medium text-left rtl:text-right {{ $bordered }} border-rounded-md border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">{{ $slot }}</button>