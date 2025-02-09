<x-app-layout>
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
                <div class="flex flex-col md:flex-row gap-6 items-center md:items-start">
                    <!-- Quiz Cover -->
                    <div class="w-full md:w-1/3">
                        <img src="{{ $course->image ? Storage::url($course->image) : asset('assets/img/no-image.jpg') }}" alt="Cover Matematika Dasar" class="w-full h-48 object-cover rounded-lg">
                    </div>

                    <!-- Quiz Details -->
                    <div class="w-full md:w-2/3">
                        <h3 class="text-2xl font-semibold mb-2">{{ $course->title }}</h3>
                        <p class="text-sm text-gray-500 mb-4">{{ $course->description }}</p>
                        <p class="text-sm text-gray-500"><strong>By :</strong> {{ $course->user->name }}</p>
                        <p class="text-sm text-gray-500 mb-4"><strong>Jumlah Pertanyaan:</strong> {{ $course->question->count() }} Pertanyaan</p>
                        
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
