<x-app-layout>
    <title>Invited Quiz - {{ config('app.name') }}</title>
    <x-slot name="header">
        <!-- Breadcrumb Navigation -->
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('siswa.dashboard') }}" class="hover:text-gray-700">DASHBOARD</a> 
            <span class="mx-2">/</span>
            <span class="text-black">MY QUIZZES</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
    
                    <!-- Header Section -->
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-2xl font-bold">My Quizzes</h3>
                        </div>
                    </div>
    
                    @if ($errors->has('question'))
                        <div class="alert alert-danger">
                            {{ $errors->first('question') }}
                        </div>
                    @endif

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

                    <!-- Table Section -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700">
                                    <th class="py-3 px-6 text-left font-medium text-gray-700 dark:text-gray-300">Quizzes</th>
                                    <th class="py-3 px-6 text-left font-medium text-gray-700 dark:text-gray-300">Date Created</th>
                                    <th class="py-3 px-6 text-left font-medium text-gray-700 dark:text-gray-300">Category</th>
                                    <th class="py-3 px-6 text-left font-medium text-gray-700 dark:text-gray-300">Attempts</th>
                                    <th class="py-3 px-6 text-left font-medium text-gray-700 dark:text-gray-300">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($courses->isEmpty())
                            <div class="text-center">
                                <p class="mt-3 mb-3 text-sm text-gray-500">Anda Tidak Bergabung di Kelas Manapun</p>
                            </div> 
                            @else
                            @foreach($courses as $course)
                                <tr class="border-b dark:border-gray-600">
                                    <td class="py-4 px-6 flex items-center">
                                        <img src="{{ $course->image ? Storage::url($course->image) : asset('assets/img/no-image.jpg') }}" alt="Icon {{ $course->title }}" class="w-10 h-10 rounded-full mr-4">
                                        <div>
                                            <p class="font-semibold">{{ $course->title }}</p>
                                            <p class="text-gray-500 text-sm capitalize">{{ $course->user->name }}</p>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">{{ $course->created_at->format('d F Y') }}</td>
                                    <td class="py-4 px-6">
                                    @if($course->is_private == 0)
                                        <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">PRIVATE</span>
                                    @endif
                                    @if($course->is_private == 1)
                                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">PUBLIC</span>
                                    @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        <p>{{ $attempts[$course->id].'/3' ?? 0 }}</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <button class="bg-orange-500 hover:bg-orange-600 text-white text-sm px-4 py-2 rounded-full">
                                            <a href="{{ route('quiz.question', ['slug' => $course->slug, 'index' => 1]) }}">Start Test</a>
                                        </button>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
