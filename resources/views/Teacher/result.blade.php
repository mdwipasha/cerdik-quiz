<x-app-layout>
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
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                <div class="flex justify-between">
                    <div class="flex items-center">
                        <!-- Quiz Icon -->
                        <div class="w-20 h-20 bg-orange-400 rounded-full flex items-center justify-center">
                            <img src="{{ $quiz->image ? Storage::url($quiz->image) : asset('assets/img/no-image.jpg') }}" alt="Icon" class="w-20 h-20 rounded-full border-2 border-dashed border-orange-500">
                        </div>

                        <!-- quiz Info -->
                        <div class="ml-4 flex-grow mb-5">
                            <h2 class="text-xl font-bold text-black">{{ $quiz->title }}</h2>
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
                            @if($quiz->is_private == 0)
                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-md text-sm">PRIVATE</span>
                            @endif
                            @if($quiz->is_private == 1)
                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-md text-sm">PUBLIC</span>
                            @endif
                        </div>
                    </div>
                    {{-- <div>
                        <form action="{{ route('delete.question', $quiz->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-500 px-5 py-2 rounded-lg"><i class="bi bi-trash"></i></button>
                        </form>
                    </div> --}}
                </div>
                <div class="p-6 overflow-x-auto">
                    {{-- <h1 class="text-xl font-semibold text-gray-700 mb-4">Quiz Results for: {{ $quiz->title }}</h1> --}}
                    
                    <table class="table-auto w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Student Name</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Score</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Correct</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($results as $key => $result)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $result->user->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $result->score }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $result->correct }} OF {{ $quiz->question->count() }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if ($result->status == 'failed')
                                            <span class="px-2 py-1 text-sm font-medium rounded-lg bg-red-100 text-red-600">
                                                {{ ucfirst($result->status) }}
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-sm font-medium rounded-lg bg-green-100 text-green-600">
                                                {{ ucfirst($result->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $result->created_at->format('d M Y H:i:s') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                        No quiz results found for this quiz.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
                    <a href="{{ route('guru.quiz') }}" class="underline text-orange-500"> <- Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
