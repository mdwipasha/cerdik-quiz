<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UX Quiz Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            overflow: hidden; /* Prevent scrolling */
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <!-- Navbar -->
    <div class="bg-white shadow w-full fixed top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-orange-400 rounded-full flex items-center justify-center mr-3">
                        <img src="{{ Storage::url($course->image) }}" alt="Icon {{ $course->title }}" class="w-6 h-6">
                    </div>
                    <span class="text-lg font-bold text-gray-800">UX Fundamental</span>
                </div>

                <!-- Profile Dropdown -->
                <div class="hidden sm:flex sm:items-center">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-base leading-4 font-bold rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div class="text-black">ARIL ABDUL</div>
                        <div class="ml-2">
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

    <!-- Main Content -->
    <div class="flex flex-col items-center justify-center w-full">
        <div class="bg-orange-100 w-24 h-24 rounded-full flex items-center justify-center mb-6">
            <img src="https://img.icons8.com/color/96/000000/books.png" alt="Books Icon" class="w-16 h-16">
        </div>
        <h1 class="text-2xl font-bold text-gray-800 mb-2">Congratulations!</h1>
        <p class="text-xl font-semibold text-gray-800 mb-4">You Have Finished Test</p>
        <p class="text-center text-gray-500 mb-6 max-w-md">Hopefully you will get a better result to prepare your great future career soon enough</p>
        <a href="{{ route('result.courses') }}"><button class="bg-orange-400 text-white font-bold py-2 px-4 rounded-lg hover:bg-orange-500">View Test Result</button></a>
    </div>
</body>

</html>
