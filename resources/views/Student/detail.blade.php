<x-app-layout>
    <title>{{ $course->title }} - {{ config('app.name') }}</title>
    <x-slot name="header">
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('siswa.dashboard') }}" class="hover:text-gray-700">DASHBOARD</a> 
            <span class="mx-2">/</span>
            <span class="text-black">DETAIL QUIZ</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Detail Quiz -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6 p-6">

                @if(session('error'))
                    <div id="alert-error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-5" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                        <button 
                            type="button" 
                            class="absolute top-0 bottom-0 right-0 px-4 py-3" 
                            onclick="document.getElementById('alert-error').style.display='none';">
                            <svg class="fill-current h-5 w-5 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.172 7.066 4.238a1 1 0 10-1.414 1.414l2.934 2.934-2.934 2.934a1 1 0 001.414 1.414L10 10.828l2.934 2.934a1 1 0 001.414-1.414l-2.934-2.934 2.934-2.934z"/>
                            </svg>
                        </button>
                    </div>
                @endif

                <div class="flex flex-col md:flex-row gap-6 items-center md:items-start">
                    <!-- Quiz Cover -->
                    <div class="w-full md:w-1/3">
                        <img src="{{ $course->image ? Storage::url($course->image) : asset('assets/img/no-image.jpg') }}" alt="Cover {{ $course->title }}" class="w-full h-48 object-cover rounded-lg">
                    </div>

                    <!-- Quiz Details -->
                    <div class="w-full md:w-2/3">
                        <h3 class="text-2xl font-semibold mb-2">{{ $course->title }}</h3>
                        <p class="text-sm text-gray-500 mb-4">{{ $course->description }}</p>
                        <p class="text-sm text-gray-500"><strong>By :</strong> {{ $course->user->name }}</p>
                        <p class="text-sm text-gray-500 mb-4"><strong>Jumlah Pertanyaan:</strong> {{ $course->question->count() }} Pertanyaan</p>
                        
                        <p class="text-sm text-gray-500 mb-4"><strong>Percobaan Kamu:</strong> ({{ $attempts }}/3)</p>

                        <!-- Buttons -->
                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="{{ route('quiz.question', ['slug' => $course->slug, 'index' => 1]) }}" class="bg-orange-500 text-white py-2 px-4 rounded-lg hover:bg-orange-600">
                                Mulai Quiz
                            </a>
                            <a href="{{ route('quiz.leaderboard', $course->id) }}" class="bg-orange-500 text-white py-2 px-4 rounded-lg hover:bg-orange-600">
                                Leaderboard
                            </a>
                            <a href="{{ route('siswa.dashboard') }}" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
