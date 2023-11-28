@props([
    'id' => '',
    'name' => '',
    'value' => '',
    'textSize' => ''
])

<input type="text" id="{{ $id }}" name="{{ $name }}" class="{{ $textSize }} font-normal font-inter mb-5 border border-black border-dashed p-2 rounded-lg w-full bg-transparent" value="{{ $value }}" required>