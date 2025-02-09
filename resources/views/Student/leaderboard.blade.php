<x-app-layout>
    <x-slot name="header">
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('siswa.dashboard') }}" class="hover:text-gray-700">DASHBOARD</a> 
            <span class="mx-2">/</span>
            <span class="text-black">LEADERBOARD QUIZ</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-center text-2xl font-bold text-gray-700 mb-6">Leaderboard - {{ $quiz->title }}</h2>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2 text-gray-700">Rank</th>
                                <th class="border border-gray-300 px-4 py-2 text-gray-700">Nama</th>
                                <th class="border border-gray-300 px-4 py-2 text-gray-700">Skor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaderboard as $index => $entry)
                                <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2 text-center font-semibold"> 
                                    @if ($index == 0)
                                        🥇 1
                                    @elseif ($index == 1)
                                        🥈 2
                                    @elseif ($index == 2)
                                        🥉 3
                                    @else
                                        {{ $index + 1 }}
                                    @endif</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $entry->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center font-bold text-orange-600">{{ $entry->score }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    