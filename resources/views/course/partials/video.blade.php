<div class="bg-white p-8">
    <h1 class="text-center text-2xl">{{ $section->title }}</h1>


    @if ($section->video)
        @include('course.partials.edit-video-form')
        <div class="flex justify-center">
            <iframe width="600" height="400" src="{{ $section->video->video }}" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
    @else
        @include('course.partials.add-video-form')
    @endif
</div>
