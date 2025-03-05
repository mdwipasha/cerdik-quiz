<x-app-layout>
    <title>Dashboard Guru - {{ config('app.name') }}</title>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Flex Container -->
                    <div class="flex items-center justify-between">
                        <!-- Kiri: Profil User -->
                        <div class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="orange" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                            <div>
                                <h1 class="text-3xl font-bold uppercase mb-3">{{ $user->name }}</h1>
                                <span class="px-3 py-1 text-sm bg-orange-200 text-orange-800 rounded-full font-semibold">{{ $user->role->nama_role }}</span>
                            </div>
                        </div>

                        <!-- Kanan: Statistik -->
                        <div class="flex flex-col items-end gap-4">
                            <div class="text-center">
                                <h2 class="text-2xl font-bold">{{ $quizCount }}</h2>
                                <p class="text-gray-500">Total Quiz</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section: Your Quiz -->
            <div class="flex justify-between mt-6 items-center">
                <h3 class="text-2xl font-bold">Your Quizzes</h3>
                <a href="{{ route('guru.quiz') }}" class="text-orange-600 hover:underline">Show More</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                @foreach ($quizzes as $quiz)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center gap-4">
                                <img src="{{ $quiz->image ? Storage::url($quiz->image) : asset('assets/img/no-image.jpg') }}" 
                                    alt="Icon {{ $quiz->title }}" class="w-16 h-16 object-cover rounded-full">
                                <div>
                                    <h4 class="text-xl font-bold uppercase mb-2">{{ $quiz->title }}</h4>
                                    <span class="px-3 py-1 text-sm {{ $quiz->is_private ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }} rounded-full font-semibold">
                                        {{ $quiz->is_private ? 'PUBLIC' : 'PRIVATE' }}
                                    </span>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-between items-center">
                                <div class="text-center">
                                    <h5 class="text-lg font-bold">{{ $quiz->question->count() }}</h5>
                                    <p class="text-gray-500">Questions</p>
                                </div>
                                {{-- <a href="{{ route('quiz.show', $quiz->slug) }}" class="text-orange-600 hover:underline">View Quiz</a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $quizzes->links() }}
            </div>
            @if ($quizzes->isEmpty())
                <p class="text-gray-500 mt-6">You have no quizzes yet. Start creating quizzes now!</p>
            @endif
        </div>
    </div>
</x-app-layout>
