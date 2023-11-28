<div class="flex flex-col h-full w-[60%]">
    {{-- lecturer photo --}}
    @if($course->lecturer->photo != null)
    <img src="{{ asset("storage/img/".$course->lecturer->photo) }}" alt="lecturer-photo" class="max-h-[45px] w-fit mb-7" />
    @endif

    {{-- course title --}}
    <div class="relative w-full" x-data="{editTitle:false}">
        <button class="absolute w-fit -top-5 -right-5" x-on:click="editTitle = !editTitle">
            <img src="{{ asset('/storage/img/assets/pencil-icon.jpg') }}" alt="edit-button" class="w-[20px]">
        </button>
        <h1 x-show="!editTitle" class="text-4xl font-normal font-inter mb-5 p-2 rounded-lg w-full ">{{ $course->title }}</h1>
        <form method="post" action="{{ route('course.edit.title', ['slug' => $course->slug]) }}" x-show="editTitle">
            @csrf
            @method('patch')
            <x-input-dashed id="course_title" name="course_title" textSize="text-4xl" value="{{ $course->title }}"></x-input-dashed>
        </form>
    </div>
    
    {{-- lecturer name --}}
    <h3 class="text-md text-slate-700 font-thin font-inter mb-8">Lecturer: <a href="#">{{ $course->lecturer->name }}</a></h3>

    {{-- go to course button --}}
    <x-direction-button src="{{ route('course.learn', ['slug' => $course->slug, 'module_order' => 1, 'section_order' => 1]) }}">Go to Course</x-direction-button>            
</div>