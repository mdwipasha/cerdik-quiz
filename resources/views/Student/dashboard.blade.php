<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Newest Course</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($newestCourses as $course)
                            <div class="border rounded-lg overflow-hidden shadow-md">
                                <img src="{{ Storage::url($course->image) }}" alt="Cover {{ $course->title }}" class="w-full h-32 object-cover">
                                <div class="p-4">
                                    <h4 class="font-semibold text-lg mb-2">
                                        <a href="{{ route('siswa.detail.courses', ['slug' => $course->slug]) }}" class="text-blue-500 hover:underline">
                                            {{ $course->title }}
                                        </a>
                                    </h4>
                                    <div class="flex justify-between">
                                        <p class="text-sm text-gray-500">
                                            By : {{ $course->user->name }}
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            {{ $course->question->count() }} Pertanyaan
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $newestCourses->links() }}
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</x-app-layout>
