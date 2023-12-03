<div class="w-full h-fit py-10 px-20">
    <div class="flex-flex-col justify-center">
        <div class="mb-10">
            <h1 class="text-3xl font-semibold text-center">Top Course Last Month</h1>
        </div>
        <div class="grid grid-cols-3 gap-4">
            @foreach($topCourses as $course)
            <div max-h-[20px]>
                <x-course-card :course="$course">
                    <h1>x new students</h1>
                </x-course-card>
            </div>
            @endforeach
        </div>
    </div>
</div>