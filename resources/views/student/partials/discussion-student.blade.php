<div class="mt-8">
    <h3 class="text-xl font-semibold">Discussion with : <span class="text-blue-500">{{ $course->lecturer->name }}</span>
    </h3>

    <div class="flex flex-col gap-4 my-6">
        @foreach ($discussion as $disc)
            <div class="bg-white shadow border-2 rounded-lg p-4">
                <div class="text-blue-500 font-bold text-sm text-left">From : {{ $disc->user->name }}</div>
                <p class="text-lg font-bold">{{ $disc->comment }}</p>
                <x-dropdown>
                    <x-slot name="trigger">
                        <p class="hover:cursor-pointer font-bold text-gray-500 mt-4">Reply</p>
                    </x-slot>

                    <form action="{{ route('reply.send') }}" method="POST">
                        @csrf
                        <label for="chat" class="sr-only">Your message</label>
                        <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                            <input type="hidden" name="discussion_id" value={{ $disc->id }}>

                            <textarea id="chat" rows="1" name="comment"
                                class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Your message..."></textarea>
                            <button type="submit"
                                class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path
                                        d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                                </svg>
                                <span class="sr-only">Send message</span>
                            </button>
                        </div>
                    </form>
                </x-dropdown>
            </div>

            @foreach ($disc->reply as $reply)
                <div class="bg-white ml-12 p-4 shadow border-2 rounded-lg">
                    <div class="text-blue-500 font-bold text-sm text-left">Reply from : {{ $reply->user->name }}</div>
                    <p class="text-lg font-bold">{{ $reply->comment }}</p>
                </div>
            @endforeach
        @endforeach
    </div>


    <form action="{{ route('discussion.send') }}" method="POST">
        @csrf
        <label for="chat" class="sr-only">Your message</label>
        <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
            <input type="hidden" name="section_id" value={{ $section->id }}>

            <textarea id="chat" rows="1" name="comment"
                class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Your message..."></textarea>
            <button type="submit"
                class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 18 20">
                    <path
                        d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                </svg>
                <span class="sr-only">Send message</span>
            </button>
        </div>
    </form>
</div>
