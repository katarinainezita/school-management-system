<div class="bg-white p-8">
    <h1 class="text-center text-2xl">{{ $sectionSelected->title }}</h1>


    @if ($sectionSelected->video)
        @include('course.partials.edit-video-form')
    @else
        @include('course.partials.add-video-form')
    @endif

    <div class="flex justify-center">
        <iframe width="600" height="400" src="{{ $sectionSelected->video->video }}"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
    </div>


</div>
