<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Detail Quiz -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Quiz Cover -->
                    <div class="mb-4">
                        <img src="{{ Storage::url($course->image) }}" alt="Cover Matematika Dasar" class="w-full h-50 object-cover rounded-lg">
                    </div>

                    <!-- Quiz Title and Description -->
                    <div class="mb-4">
                        <h3 class="text-2xl font-semibold mb-2">{{ $course->title }}</h3>
                        <p class="text-sm text-gray-500">{{ $course->description }}</p>
                    </div>

                    <!-- Quiz Information -->
                    <div class="mb-6">
                        <p class="text-sm text-gray-500">
                            <strong>Jumlah Pertanyaan:</strong> {{ $course->question->count() }} Pertanyaan
                        </p>
                        <p class="text-sm text-gray-500">
                            @if ($course->is_private == 0)
                                <strong>Tipe Quiz:</strong> PRIVATE
                            @endif
                            @if ($course->is_private == 1)                     
                                <strong>Tipe Quiz:</strong> PUBLIC
                            @endif
                        </p>
                    </div>

                    <!-- Button untuk Mengerjakan Quiz -->
                    <div class="mt-6">
                        <a href="{{ route('quiz.question', ['slug' => $course->slug, 'index' => 1]) }}" class="bg-orange-500 text-white py-2 px-4 rounded-lg hover:bg-orange-600 mr-3">
                            Mulai Quiz
                        </a>
                        <a href="{{ route('siswa.dashboard') }}" class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
