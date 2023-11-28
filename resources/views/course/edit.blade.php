<x-app-layout>

    <div class="relative min-h-[22rem] bg-blue-100 border-2 px-10 py-14">
        {{-- message --}}
        <div class="absolute top-[2px] w-full">
        @if (session('status'))
            <div class="flex items-center justify-center">
                @if (session('status') == 'success')
                    <x-success-alert>{{ session('message') }}</x-success-alert>
                @elseif (session('status') == 'fail')
                    <x-warning-alert>{{ session('message') }} hwhw</x-warning-alert>
                @endif
            </div>
        @endif

        @if($errors->any())
            <div class="flex items-center justify-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><x-warning-alert>{{ $error }}</x-warning-alert></li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>

        @include('course.partials.edit-header', ['mode' => 'edit'])
    </div>

    @include('course.partials.summary-card', ['mode' => 'edit'])

    <div class="border-x-2 px-10 py-14">
        <div class="flex flex-col w-[60%]">
            {{-- Description --}}
            <div class="mb-10">
                @include('course.partials.edit-description', ['mode' => 'edit'])
            </div>

            {{-- Modules --}}
            <div class="mb-10">
                @include('course.partials.edit-modules-list', ['mode' => 'edit'])
            </div>

            {{-- Reviews --}}
            <div class="mb-10">
                @include('course.partials.edit-review', ['mode' => 'edit'])
            </div>
        </div>
    </div>
</x-app-layout>