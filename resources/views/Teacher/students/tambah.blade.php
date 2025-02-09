<x-app-layout>
    <x-slot name="header">
        <!-- Breadcrumb Navigation -->
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('guru.dashboard') }}" class="hover:text-gray-700">HOME</a>
            <span class="mx-2">/</span>
            <a href="{{ route('guru.quiz') }}" class="hover:text-gray-700">MANAGE QUIZ</a>
            <span class="mx-2">/</span>
            <span class="text-black">QUIZ DETAIL</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <!-- Quiz Card -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                    <div class="flex items-center">
                        <!-- Quiz Icon -->
                        <div class="w-20 h-20 bg-orange-400 rounded-full flex items-center justify-center">
                            <img src="{{ $course->image ? Storage::url($course->image) : asset('assets/img/no-image.jpg') }}" alt="Icon" class="w-20 h-20 rounded-full border-2 border-dashed border-orange-500">
                        </div>

                        <!-- Quiz Info -->
                        <div class="ml-4 flex-grow mb-5">
                            <h2 class="text-xl font-bold text-black">{{ $course->title }}</h2>
                            <div class="text-sm text-gray-500 flex items-center mt-1">
                                <span class="mr-4 flex items-center">
                                    <i class="bi bi-calendar mr-1 text-lg"></i> {{ $course->created_at->format('F j, Y') }}
                                </span>
                            @if($course->is_private == 0)
                                <span class="flex items-center">
                                    <i class="bi bi-person mr-1 text-lg"></i> {{ is_array($course->user_emails) || $course->user_emails instanceof Countable ? count($course->user_emails) : '0' }}
                                </span>
                            @endif
                            </div>
                            @if($course->is_private == 0)
                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-md text-sm">PRIVATE</span>
                            @endif
                            @if($course->is_private == 1)
                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-md text-sm">PUBLIC</span>
                            @endif
                        </div>
                    </div>

                  <!-- Add New Question Form -->
                  <div>
                    <h3 class="text-lg font-semibold text-black mb-4">Add New Student</h3>
                    <p class="mt-3 text-sm font-bold text-gray-600">EMAIL ADDRES</p>
                    <form action="{{ route('store.siswa', $course->id) }}" method="POST">
                        @csrf
                        <div class="mb-4 relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="bi bi-card-text text-gray-400"></i>
                            </div>
                            <input type="email" name="emails[]" id="email" placeholder="Write Student Email Addres"
                                class="w-full pl-10 py-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                            @if ($errors->has('emails'))
                                <p class="text-red-500 text-sm">{{ $errors->first('emails') }}</p>
                            @endif
                            @error('emails.*')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        <!-- Save Button -->
                        <div class="mt-6">
                            <button type="submit"
                                class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold hover:bg-orange-600 transition">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
