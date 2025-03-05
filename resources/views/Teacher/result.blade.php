<x-app-layout>
    <title> Result {{ $quiz->title }} - {{ config('app.name') }}</title>
    <x-slot name="header">
        <!-- Breadcrumb Navigation -->
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('guru.dashboard') }}" class="hover:text-gray-700">HOME</a>
            <span class="mx-2">/</span>
            <a href="{{ route('guru.quiz') }}" class="hover:text-gray-700">MANAGE QUIZ</a>
            <span class="mx-2">/</span>
            <span class="text-black">RESULT QUIZ</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gray-50 p-6 rounded-t-lg shadow-md flex justify-between items-center">
                    <div class="flex items-center">
                        <!-- Quiz Icon -->
                        <div class="w-20 h-20 bg-orange-400 rounded-full flex items-center justify-center">
                            <img src="{{ $quiz->image ? Storage::url($quiz->image) : asset('assets/img/no-image.jpg') }}" alt="Icon {{ $quiz->title }}" class="w-20 h-20 rounded-full border-2 border-dashed border-orange-500">
                        </div>

                        <!-- Quiz Info -->
                        <div class="ml-4 flex-grow">
                            <h2 class="text-2xl font-bold text-black">{{ $quiz->title }}</h2>
                            <div class="text-sm text-gray-500 flex items-center mt-1">
                                <span class="mr-4 flex items-center">
                                    <i class="bi bi-calendar mr-1 text-lg"></i> {{ $quiz->created_at->format('F j, Y') }}
                                </span>
                                @if($quiz->is_private == 0)
                                    <span class="flex items-center">
                                        <i class="bi bi-person mr-1 text-lg"></i> {{ is_array($quiz->user_emails) || $quiz->user_emails instanceof Countable ? count($quiz->user_emails) : '0' }}
                                    </span>
                                @endif
                            </div>
                            <span class="px-3 py-1 rounded-md text-sm font-semibold {{ $quiz->is_private ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                {{ $quiz->is_private ? 'PUBLIC' : 'PRIVATE' }}
                            </span>
                        </div>
                    </div>
                    <form action="{{ route('result.quiz.delete.all', $quiz->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete all quiz results?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-500 px-5 py-3 text-xl rounded-lg"><i class="bi bi-trash"></i></button>
                    </form>
                </div>

                <!-- Filter Sorting -->
                <div class="p-6 bg-white border-b items-center">
                    <form action="" method="GET">
                        <label for="sort" class="font-semibold text-gray-600">Sort by:</label>
                        <select name="sort" onchange="this.form.submit()" class="border-orange-500 rounded-md text-sm">
                            <option value="">Sort By</option>
                            <option value="latest" {{ $sort == 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="oldest" {{ $sort == 'oldest' ? 'selected' : '' }}>Terlama</option>
                            <option value="highest_score" {{ $sort == 'highest_score' ? 'selected' : '' }}>Score Tertinggi</option>
                            <option value="lowest_score" {{ $sort == 'lowest_score' ? 'selected' : '' }}>Score Terendah</option>
                        </select>
                    </form>
                </div>

                <!-- Quiz Results Table -->
                <div class="p-6 overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-orange-500 text-white text-left">
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Student Name</th>
                                <th class="px-4 py-3">Score</th>
                                <th class="px-4 py-3">Correct</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($results as $key => $result)
                                <tr class="{{ $key % 2 == 0 ? 'bg-gray-50' : 'bg-white' }} border-b">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 font-medium">{{ $result->user->name }}</td>
                                    <td class="px-4 py-3 font-semibold text-orange-600">{{ $result->score }}</td>
                                    <td class="px-4 py-3">{{ $result->correct }} OF {{ $quiz->question->count() }}</td>
                                    <td class="px-4 py-3">
                                        @if ($result->status == 'Pending')
                                            <span class="px-2 py-1 text-sm font-medium rounded-lg bg-yellow-100 text-yellow-600 flex items-center">
                                                <i class="bi bi-hourglass-split mr-1"></i> {{ ucfirst($result->status) }}
                                            </span>
                                        @elseif ($result->status == 'Passed')
                                            <span class="px-2 py-1 text-sm font-medium rounded-lg bg-green-100 text-green-600 flex items-center">
                                                <i class="bi bi-check-circle mr-1"></i> Passed
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-sm font-medium rounded-lg bg-red-100 text-red-600 flex items-center">
                                                <i class="bi bi-x-circle mr-1"></i> Failed
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">{{ $result->created_at->format('d M Y H:i:s') }}</td>
                                    <td class="px-4 py-3">
                                        <form action="{{ route('result.quiz.delete', $result->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this result?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white bg-red-500 px-2 py-1 rounded-full"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-3 text-center text-gray-500">
                                        No quiz results found for this quiz.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-6">
                    <a href="{{ route('guru.quiz') }}" class="text-orange-500 font-semibold hover:underline">
                        ← Back to Quiz List
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
