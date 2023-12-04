@props([
    'class' => ''
])

<button type="submit" class="text-white font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 {{ $class }}">
    <img src="{{ asset('storage/img/assets/arrow-down-icon.png') }}" class="rotate-90 w-[20px] h-auto">
</button>