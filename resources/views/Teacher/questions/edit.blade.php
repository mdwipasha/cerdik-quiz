<x-app-layout>
    <x-slot name="header">
        <!-- Breadcrumb Navigation -->
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('guru.dashboard') }}" class="hover:text-gray-700">HOME</a>
            <span class="mx-2">/</span>
            <a href="{{ route('guru.quiz') }}" class="hover:text-gray-700">MANAGE QUIZ</a>
            <span class="mx-2">/</span>
            {{-- <a href="{{ route('detail.courses', ['slug' => $course->slug]) }}" class="hover:text-gray-700">DETAIL QUIZ</a>
            <span class="mx-2">/</span> --}}
            <span class="text-black">EDIT QUESTION</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <!-- Edit Question Form -->
                <h3 class="text-lg font-semibold text-black mb-4">Edit Question</h3>
                <form action="{{ route('update.question', $question->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Question Input -->
                    <p class="mt-3 text-sm font-bold text-gray-800">Question</p>
                    <div class="mb-4 relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <i class="bi bi-card-text text-gray-400"></i>
                        </div>
                        <input type="text" id="question" name="question" value="{{ $question->question }}" placeholder="Edit the question"
                            class="w-full pl-10 py-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                    </div>

                    <!-- Answer Options -->
                    <p class="mt-3 text-sm font-bold text-gray-800">Answers</p>
                    <div class="space-y-4">
                        @foreach ($question->answer as $index => $answer)
                            <div class="flex items-center space-x-3">
                                <div class="relative flex-grow">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <i class="bi bi-pencil text-gray-400"></i>
                                    </div>
                                    <input type="text" name="answers[{{ $answer->id }}]" value="{{ $answer->answer }}" placeholder="Edit answer option"
                                        class="w-full pl-10 py-3 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-orange-500">
                                </div>
                                <input type="radio" name="correct_answer" value="{{ $answer->id }}" id="correct_{{ $answer->id }}"
                                    class="form-radio text-orange-500" {{ $answer->is_correct ? 'checked' : '' }} required>
                                <label for="correct_{{ $answer->id }}" class="text-sm">Correct</label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Save Button -->
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold hover:bg-orange-600 transition">Update Question</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>