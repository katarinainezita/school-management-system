<div class="relative p-5 max-w-[600px] mx-auto min-h-[380px]">
    {{-- title --}}
    <h1 class="text-xl text-blue-400 font-semibold mb-5">{{ $section->title }}</h1>


    @if ($section->article == null)
        @include('course.partials.add-article-form', ['id' => $section->id])
    @else
        @include('course.partials.delete-article-form', [
            'id' => $section->id,
            'article' => $section->article,
        ])
        @include('course.partials.edit-article-form', [
            'id' => $section->id,
            'article' => $section->article,
        ])
    @endif


    {{-- content --}}
    @foreach (explode("\n", $section->article->text ?? '') as $paragraph)
        <p class="mb-2 text-justify first-letter:ml-10">{{ $paragraph ?? 'Paragraph' }}</p>
    @endforeach

</div>
