@props([
    'id' => '',
    'title' => '-',
    'description' => '-',
    'level' => 'beginner',
    'category' => 'back end',
    'image' => '',
    'verified' => false,
])

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg bg-cover w-full" src="{{ asset("storage/img/".$image) }}" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $title }}</h5>
        </a>
        <div class="flex justify-left mb-2">
            <x-badge bgColor='bg-blue-200' textColor="text-blue-700" textSize="text-md" fontWeight="font-semibold"> {{ $category }} </x-badge>
            <x-badge bgColor="bg-pink-200" textColor="text-pink-700" textSize="text-md" fontWeight="font-semibold"> {{ $level }} </x-badge>
        </div>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($description,150) }}</p>
        <div class="flex justify-between">
            <a href="#" class="px-3 py-2 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Detail
            </a>
            @if (Auth::User()->isAdmin() && !$verified)
            <form method="POST" action="{{ url('/course/verify') }}">
                @method('PATCH')    
                @csrf
                <input type="hidden" name="course_id" value="{{ $id }}">
                <button type="submit" class="px-3 py-2 text-sm font-medium text-center text-white bg-orange-700 rounded-lg hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Verify
                </button>
            </form>
            @endif
        </div>
    </div>
</div>