<x-app-layout>
    <x-slot name="header">
        <!-- Breadcrumb Navigation -->
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('siswa.dashboard') }}" class="hover:text-gray-700">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('siswa.course') }}" class="hover:text-gray-700">My Courses</a>
            <span class="mx-2">/</span>
            <span class="text-black">Results Details</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <h1 class="text-xl font-semibold text-gray-700 mb-4">Results Details</h1>
                    
                    <table class="table-auto w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Quiz Title</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Score</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($results as $key => $result)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $result->quiz->title }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $result->score }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if ($result->status == 0)
                                        <span class="px-2 py-1 text-sm font-medium rounded-lg bg-yellow-100 text-yellow-600">
                                            Pending
                                        </span>
                                        @else
                                        <span class="px-2 py-1 text-sm font-medium rounded-lg bg-green-100 text-green-600">
                                            Complete
                                        </span>
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $result->created_at->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                        No quiz results found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
