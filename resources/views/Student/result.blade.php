<x-app-layout>
    <x-slot name="header">
        <!-- Breadcrumb Navigation -->
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('siswa.dashboard') }}" class="hover:text-gray-700">DASHBOARD</a>
            <span class="mx-2">/</span>
            <span class="text-black">RESULT DETAILS</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <!-- Header Section -->
                    <div class="flex items-center justify-between border-b pb-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-orange-400 rounded-full flex items-center justify-center overflow-hidden">
                                <img src="{{ $quiz->image ? Storage::url($quiz->image) : asset('assets/img/no-image.jpg') }}" alt="Icon {{ $quiz->title }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">{{ $quiz->title }}</h1>
                                <p class="text-sm text-gray-500">By : {{ $quiz->user->name }}</p>
                            </div>
                        </div>
                        <div class="text-xs font-bold px-4 py-2 rounded-lg border-dotted {{ $status == 'Passed' ? 'bg-green-500 border-green-100' : 'bg-red-500 border-red-100' }} text-white ">
                            {{ $status }}
                        </div>
                    </div>

                    <!-- Score Section -->
                    <div class="mt-4 text-center">
                        <p class="text-xl font-extrabold text-gray-900">{{ $correct }} of {{ $quiz->question->count() }} Correct</p>
                        <p class="text-xl font-extrabold text-gray-900">Score : {{ $score }}</p>
                    </div>

                    <!-- Questions Section -->
                    <div class="mt-4 space-y-4">
                        @foreach($results as $result)
                        <div class="p-4 border rounded-lg bg-gray-50">
                            <p class="text-gray-900 font-semibold">{{ $result['question'] }} ?</p>
                            <div class="flex items-center justify-between mt-2 text-sm">
                                <div>
                                    <p class="text-gray-700">Your Answer: <span class="font-semibold">({{ $result['user_answer'] }})</span></p>
                                    <p class="text-gray-700">Correct Answer: <span class="font-semibold">({{ $result['correct_answer'] }})</span></p>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $result['is_correct'] ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $result['is_correct'] ? 'Correct' : 'Incorrect' }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-8 flex justify-between">
                        <a href="{{ route('siswa.dashboard') }}" class="bg-orange-700 text-white text-sm font-semibold px-6 py-2 rounded-md hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-orange-600">Kembali</a>
                        <a href="#" class="bg-gray-800 text-white text-sm font-semibold px-6 py-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">Coba Lagi ?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
