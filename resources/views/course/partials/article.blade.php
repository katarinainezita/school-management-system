<div class="p-5 max-w-[600px] mx-auto min-h-[380px]">
    {{-- title --}}
    <h1 class="text-xl font-semibold mb-5">{{ $sectionSelected->title }}</h1>

    {{-- content --}}
    @foreach(explode("\n", $sectionSelected->content->text) as $paragraph)
    <p class="mb-2 text-justify first-letter:ml-10">{{ $paragraph }}</p>
    @endforeach
    
</div>