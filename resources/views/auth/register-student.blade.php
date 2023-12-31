<x-guest-layout>
    <div class="relative" x-data="{ role: '' }">
        <a href="#" type="button"
            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-l-lg text-sm px-5 py-2.5 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Student</a>

        <a href="{{ route('register.lecturer') }}" type="button"
            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-r-lg text-sm px-5 py-2.5 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Lecturer</a>
        
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

        <form method="POST" action="{{ route('register.student.submit') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" id="type" name="type" value="App\Models\Student">

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- phone number --}}
            <div>
                <x-input-label for="phoneNumber" :value="__('Phone Number')" />
                <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber" :value="old('phoneNumber')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
            </div>

            <!-- Date of Birth -->
            <div>
                <x-input-label for="dateOfBirth" :value="__('Date of Birth')" />
                <x-text-input id="dateOfBirth" class="block mt-1 w-full" type="date" name="dateOfBirth"
                    :value="old('dateOfBirth')" required autofocus autocomplete="bdate" />
                <x-input-error :messages="$errors->get('dateOfBirth')" class="mt-2" />
            </div>

            <!-- Profile Picture -->
            <div>
                <x-input-label for="profile_picture" :value="__('Profile Picture')" />
                <input id="profile_picture" type="file" class="block mt-1 w-full" name="profile_picture" accept="image/*"
                    :value="old('profile_picture')" required />
                <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
