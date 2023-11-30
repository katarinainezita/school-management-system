<div class="p-5 max-w-[600px] mx-auto min-h-[380px]">
    {{-- title --}}
    <h1 class="text-xl text-blue-400 font-semibold mb-5">{{ $sectionSelected->title }}</h1>


    @if ($sectionSelected->article == null)
        @include('course.partials.add-article-form', ['id' => $sectionSelected->id])
    @else
        @include('course.partials.edit-article-form', [
            'id' => $sectionSelected->id,
            'article' => $sectionSelected->article,
        ])
    @endif


    {{-- content --}}
    @foreach (explode("\n", $sectionSelected->article->text ?? '') as $paragraph)
        <p class="mb-2 text-justify first-letter:ml-10">{{ $paragraph ?? 'Paragraph' }}</p>
    @endforeach

</div>
