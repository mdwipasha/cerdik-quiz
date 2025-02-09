<x-app-layout>
    <x-slot name="header">
        <!-- Breadcrumb Navigation -->
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('guru.dashboard') }}" class="hover:text-gray-700">HOME</a>
            <span class="mx-2">/</span>
            <a href="{{ route('guru.quiz') }}" class="hover:text-gray-700">MANAGE QUIZ</a>
            <span class="mx-2">/</span>
            <span class="text-black">QUIZ DETAIL</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Quiz Card -->
                    <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                        <div class="flex items-center">
                            <!-- Quiz Icon -->
                            <div class="w-20 h-20 bg-orange-400 rounded-full flex items-center justify-center">
                                <img src="{{ $course->image ? Storage::url($course->image) : asset('assets/img/no-image.jpg') }}" alt="Icon" class="w-20 h-20 rounded-full border-2 border-dashed border-orange-500">
                            </div>

                            <!-- Quiz Info -->
                            <div class="ml-4 flex-grow">
                                <h2 class="text-xl font-bold text-black">{{ $course->title }}</h2>
                                <div class="text-sm text-gray-500 flex items-center mt-1">
                                    <span class="mr-4 flex items-center">
                                        <i class="bi bi-calendar mr-1 text-lg"></i> {{ $course->created_at->format('F j, Y') }}
                                    </span>
                                @if($course->is_private == 0)
                                    <span class="flex items-center">
                                        <i class="bi bi-person mr-1 text-lg"></i> {{ is_array($course->user_emails) || $course->user_emails instanceof Countable ? count($course->user_emails) : '0' }}
                                    </span>
                                @endif
                                </div>
                                @if($course->is_private == 0)
                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-md text-sm">PRIVATE</span>
                                @endif
                                @if($course->is_private == 1)
                                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-md text-sm">PUBLIC</span>
                                @endif
                            </div>
                        </div>

                        <!-- Divider -->
                        <hr class="my-6">
                        @if(session('success'))
                            <div id="alert-success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5" role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                                <button 
                                    type="button" 
                                    class="absolute top-0 bottom-0 right-0 px-4 py-3" 
                                    onclick="document.getElementById('alert-success').style.display='none';">
                                    <svg class="fill-current h-5 w-5 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.172 7.066 4.238a1 1 0 10-1.414 1.414l2.934 2.934-2.934 2.934a1 1 0 001.414 1.414L10 10.828l2.934 2.934a1 1 0 001.414-1.414l-2.934-2.934 2.934-2.934z"/>
                                    </svg>
                                </button>
                            </div>
                        @endif

                        <div>
                            <a href="{{ route('create.siswa', ['slug' => $course->slug]) }}">
                                <button class="border border-dashed border-gray-400 px-4 py-3 rounded-lg w-full text-gray-600 hover:border-gray-600 hover:bg-gray-50 mb-5">
                                    <i class="bi bi-plus-circle mr-2"></i> Add Students
                                </button>
                            </a>
                            @if(empty($course->user_emails))
                                <div class="text-center">
                                    <p class="mt-3 mb-3 text-sm text-gray-500">Anda Belum Menambahkan Siswa</p>
                                </div> 
                            @else 
                            <div>
                              @foreach($students as $student)
                                    <div class="mb-5">
                                        <div class="flex items-center justify-between p-4 border rounded-lg border-gray-300">
                                            <div>
                                                <p class="text-lg font-black text-black capitalize">{{ $student->name }}</p>
                                                <p class="text-gray-500 text-sm">{{ $student->email }}</p>
                                            </div>
                                            <div class="flex space-x-2">
                                                @if($student->userQuiz)
                                                    <span class="px-2 py-1 rounded-full {{ $student->userQuiz->status == 'failed' ? 'bg-red-200 text-red-800' : 'bg-green-200 text-green-800' }}">
                                                        {{ ucfirst($student->userQuiz->status) }}
                                                    </span>
                                                @else
                                                    <span class="px-2 py-2 rounded-full bg-yellow-200 text-yellow-800">
                                                        Not Started
                                                    </span>
                                                @endif
                                                <form action="{{ route('delete.siswa', $course->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="email" value="{{ $student->email }}">
                                                    <button type="submit" class="text-white bg-red-500 px-3 py-2 rounded-full"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                          @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
