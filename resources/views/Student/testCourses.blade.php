<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            overflow: hidden;
        }

        input[type="radio"]:checked+label {
            border-color: black;
            border-width: 2px;
        }

        input[type="radio"]:checked+label svg {
            display: block;
        }
    </style>
</head>

<body class="bg-gray-100">

<!-- Navbar -->
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-orange-400 rounded-full flex items-center justify-center mr-3">
                        <img src="{{ Storage::url($quiz->image) }}" alt="Icon Quiz" class="w-10 h-10 rounded-full">
                    </div>
                    <span class="text-lg font-bold text-gray-800">{{ $quiz->title }}</span>
                </div>

                <!-- Profile Dropdown -->
                <div class="hidden sm:flex sm:items-center">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-base leading-4 font-bold rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div class="text-black">{{ Auth::user()->name }}</div>
                        <div class="ms-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="orange" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                        </div>
                    </button>
                </div>

            </div>
        </div>
    </div>

</nav>
    <!-- Quiz Form -->
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-lg p-5 max-w-2xl w-full">
            <header class="text-center mb-10">
                <h1 class="text-4xl font-bold">{{ $currentQuestion->question }}</h1>
                <p>Question {{ $index }} of {{ $questions->count() }}</p>
            </header>
            <form action="{{ route('quiz.answer', $quiz->slug) }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="question_id" value="{{ $currentQuestion->id }}">
                <input type="hidden" name="current_index" value="{{ $index }}">

                @foreach($currentQuestion->answer as $answer)
                <div class="relative">
                    <input type="radio" name="answer_id" value="{{ $answer->id }}" id="answer_{{ $answer->id }}" required class="hidden peer" />
                    <label for="answer_{{ $answer->id }}" class="p-4 border border-gray-300 rounded-lg cursor-pointer flex items-center justify-between peer-checked:border-black peer-checked:ring-2 peer-checked:ring-black">
                        {{ $answer->answer }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </label>
                </div>
                @endforeach
               
                <button type="submit" class="w-full bg-orange-600 text-white py-3 rounded-lg font-semibold hover:bg-orange-700">
                    {{ $index == $questions->count() ? 'Finish' : 'Next' }}
                </button>
            </form>
        </div>
    </div>

</body>

</html>
