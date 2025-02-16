<x-app-layout>
    <x-slot name="header">
        <!-- Breadcrumb Navigation -->
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('siswa.dashboard') }}" class="hover:text-gray-700">DASHBOARD</a>
            <span class="mx-2">/</span>
            <span class="text-black">Result Quizzes</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-700 mb-6">Results Quizzes</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($results as $result)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <!-- Bagian Gambar -->
                        <img src="{{ $result->quiz->image ? Storage::url($result->quiz->image) : asset('assets/img/no-image.jpg') }}" 
                             alt="{{ $result->quiz->title }}" 
                             class="w-full h-40 object-cover">

                        <div class="p-4">
                            <div class="flex items-center mb-4">
                                <div class="text-sm font-medium text-gray-600">
                                    {{ $result->quiz->title }}
                                </div>
                                <span class="ml-auto bg-orange-100 text-orange-600 text-xs font-medium px-2 py-1 rounded-lg">
                                    {{ $quiz->question->count() }} Qs
                                </span>
                            </div>
                            <div class="mb-2">
                                <span class="block text-sm font-semibold text-gray-700">Score:</span>
                                <span class="block text-lg font-bold {{ $result->score < 80 ? 'text-red-600' : 'text-green-600' }}">{{ $result->score }}%</span>
                            </div>
                            <div class="mb-2">
                                <span class="block text-sm font-semibold text-gray-700">Correct:</span>
                                <span class="block text-gray-600">{{ $result->correct }} of {{ $quiz->question->count() }}</span>
                            </div>
                            <div class="mb-2">
                                <span class="block text-sm font-semibold text-gray-700">Status:</span>
                                <span class="block px-2 w-14 py-1 text-xs font-medium rounded-lg {{ $result->status == 'Failed' ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }}">
                                    {{ ucfirst($result->status) }}
                                </span>
                            </div>
                            <div>
                                <span class="block text-sm font-semibold text-gray-700">Date:</span>
                                <span class="block text-gray-600">{{ $result->created_at->format('d M Y H:i') }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">
                        No quiz results found.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
