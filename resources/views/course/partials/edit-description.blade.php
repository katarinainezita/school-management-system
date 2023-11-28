<div>
    <h1 class="text-xl font-semibold font-inter mb-3">About this course</h1>

    <div class="relative w-full" x-data="{editDesc:false}">
        @if($mode == 'edit')
        <button class="absolute w-fit -top-5 -right-5" x-on:click="editDesc = !editDesc">
            <img src="{{ asset('/storage/img/assets/pencil-icon.jpg') }}" alt="edit-button" class="w-[20px]">
        </button>
        
        <form method="post" action="{{ route('course.edit.desc', ['slug' => $course->slug]) }}" x-show="editDesc">
            @csrf
            @method('patch')
            <x-input-textarea-dashed id="course_description" name="course_description" textSize="text-md" value="{{ $course->description }}" rows="5" ></x-input-textarea-dashed>
            
            <div class="absolute -bottom-[60px] -right-[20px]">
                <x-button type="submit">Edit</x-button>
            </div>
        </form>
        @endif

        @foreach(explode("\n", $course->description) as $desc)
        <p x-show="!editDesc" class="first-letter:ml-10 text-md font-thin p-2 rounded-lg w-full font-montserrat text-justify">{{ $desc }}</p>
        @endforeach
    </div>
</div>
