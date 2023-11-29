<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="{{ route('course.detail', ['slug' => $course->slug ?? 'default-slug']) }}">
        <img class="rounded-t-lg bg-cover w-full" src="{{ asset('storage/img/' . $course->photo) }}" alt="" />
    </a>
    <div class="p-5">
        <a href="{{ route('course.detail', ['slug' => $course->slug ?? 'default-slug']) }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $course->title ?? 'Course Title' }}
            </h5>
        </a>
        <div class="flex justify-left mb-2">
            <x-badge bgColor='bg-blue-200' textColor="text-blue-700" textSize="text-md" fontWeight="font-semibold">
                {{ $course->category ?? 'Course Catetgory' }} </x-badge>
            <x-badge bgColor="bg-pink-200" textColor="text-pink-700" textSize="text-md" fontWeight="font-semibold">
                {{ $course->level ?? 'Course Level' }} </x-badge>
        </div>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ Str::limit($course->description, 150) ?? 'Course Descirption' }}</p>

        {{ $slot }}
    </div>
</div>
