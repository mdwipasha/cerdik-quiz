<x-app-layout>
    <x-slot name="header">
        <!-- Breadcrumb Navigation -->
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('guru.dashboard') }}" class="hover:text-gray-700">DASHBOARD</a>
            <span class="mx-2">/</span>
            <span class="text-black">MANAGE COURSE</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Header Section -->
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-2xl font-bold">Manage Course</h3>
                        </div>
                        <button class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg">
                            <a href="{{ route('create.courses') }}">Add New Course</a>
                        </button>
                    </div>

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

                    <!-- Table Section -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700">
                                    <th class="py-3 px-6 text-left font-medium text-gray-700 dark:text-gray-300">Course</th>
                                    <th class="py-3 px-6 text-left font-medium text-gray-700 dark:text-gray-300">Date Created</th>
                                    <th class="py-3 px-6 text-left font-medium text-gray-700 dark:text-gray-300">Access Type</th>
                                    <th class="py-3 px-6 text-left font-medium text-gray-700 dark:text-gray-300">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)
                                <tr class="border-b dark:border-gray-600">
                                    <td class="py-4 px-6 flex items-center">
                                        <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}" class="w-10 h-10 rounded-full mr-4">
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
                                    <td class="py-4 px-6 relative" x-data="{ open: false }">
                                        <button @click="open = !open" class="text-black-600 dark:text-gray-300 hover:text-gray-800">
                                            Menu <span class="ml-2"><i class="bi bi-chevron-compact-down text-lg"></i></span>
                                        </button>
                                        <div
                                            x-show="open"
                                            @click.outside="open = false"
                                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-lg shadow-lg z-10">
                                            <a href="{{ route('detail.courses', ['slug' => $course->slug]) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">Manage</a>
                                            <a href="{{ route('siswa.courses', ['slug' => $course->slug]) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">Add Students</a>
                                            <a href="{{ route('edit.quiz', ['id' => $course->id]) }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">Edit</a>
                                            <form method="POST" action="{{ route('delete.quiz', $course->id) }}" class="block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-600">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="//unpkg.com/alpinejs" defer></script>
