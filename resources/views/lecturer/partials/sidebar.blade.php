<div class="relative flex flex-col bg-clip-border rounded-r-xl bg-slate-300 text-gray-700 w-fit p-4 shadow-xl shadow-blue-gray-900/5">
  <div class="flex mb-2 p-2">
    <button class="block antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-gray-900 w-7 h-7 text-center" x-on:click="open=!open" type="button">M</button>
  </div>
      <ul class="space-y-2 font-medium my-1">
         <li>
            <a href="{{ route('lecturer.dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <img src="{{ asset('storage/img/assets/dashboard-icon.png') }}" alt="icon-dashboard" class="w-7 h-7">
               <span x-show="open" class="ml-3 mr-5">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="{{ route('lecturer.courses', ['page' => 1]) }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <img src="{{ asset('storage/img/assets/course-icon.png') }}" alt="icon-courses" class="w-7 h-7">
               <span x-show="open" class="ml-3 mr-5">Available Courses</span>
            </a>
         </li>
         <li>
            <a href="{{ route('lecturer.draft-courses', ['page' => 1]) }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <img src="{{ asset('storage/img/assets/draft-icon.png') }}" alt="icon-courses" class="w-7 h-7">
               <span x-show="open" class="ml-3 mr-5">Draft Courses</span>
            </a>
         </li>
         <li>
            <a href="{{ route('lecturer.submitted-courses', ['page' => 1]) }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <img src="{{ asset('storage/img/assets/submit-icon.png') }}" alt="icon-courses" class="w-7 h-7">
               <span x-show="open" class="ml-3 mr-5">Submitted Courses</span>
            </a>
         </li>
         <li>
            <a href="{{ route('lecturer.discussions', ['page' => 1]) }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <img src="{{ asset('storage/img/assets/discussion-icon.png') }}" alt="icon-discussions" class="w-7 h-7">
               <span x-show="open" class="ml-3 mr-5">Discussion</span>
            </a>
         </li>
         <li>
            <a href="{{ route('lecturer.reviews', ['page' => 1]) }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <img src="{{ asset('storage/img/assets/review-icon.png') }}" alt="icon-review" class="w-7 h-7">
               <span x-show="open" class="ml-3 mr-5">Reviews</span>
            </a>
         </li>
         <li>
            <a href="{{ route('lecturer.rejections', ['page' => 1]) }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <img src="{{ asset('storage/img/assets/rejection-icon.png') }}" alt="icon-rejections" class="w-7 h-7">
               <span x-show="open" class="ml-3 mr-5">Rejections</span>
            </a>
         </li>
      </ul>
</div>