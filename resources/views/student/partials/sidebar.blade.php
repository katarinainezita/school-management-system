<div
    class="relative flex flex-col bg-clip-border rounded-r-xl bg-slate-300 text-gray-700 h-full w-fit p-4 shadow-xl shadow-blue-gray-900/5">
    <div class="flex mb-2 p-2">
        <button
            class="block antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-gray-900 w-7 h-7 text-center"
            x-on:click="open=!open" type="button"><x-heroicon-o-arrow-right-circle /></button>
    </div>
    <ul class="space-y-2 font-medium my-1">
        <li>
            <a href="{{ route('student.dashboard') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                <span x-show="open" class="ml-3 mr-5">Course</span>
            </a>
        </li>
        <li>
            <a href="{{ route('student.mycourse') }}"
                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">

                <span x-show="open" class="ml-3 mr-5">My Course</span>
            </a>
        </li>
    </ul>
</div>
