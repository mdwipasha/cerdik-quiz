<x-app-layout>
    <x-slot name="header">
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('siswa.dashboard') }}" class="hover:text-gray-700">DASHBOARD</a> 
            <span class="mx-2">/</span>
            <span class="text-black">LEADERBOARD QUIZ</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-8">
                <h2 class="text-center text-3xl font-bold text-gray-800 mb-6">🏆 Leaderboard - {{ $quiz->title }}</h2>
                <div class="overflow-hidden border border-gray-300 rounded-lg">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-orange-500 text-white text-center">
                                <th class="px-6 py-3 text-lg">Rank</th>
                                <th class="px-6 py-3 text-lg">Nama</th>
                                <th class="px-6 py-3 text-lg">Score</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                            @foreach($leaderboard as $index => $entry)
                                <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200 transition duration-200">
                                    <td class="px-6 py-4 text-center font-semibold text-lg">
                                        @if ($index == 0)
                                            🥇 1
                                        @elseif ($index == 1)
                                            🥈 2
                                        @elseif ($index == 2)
                                            🥉 3
                                        @else
                                            {{ $index + 1 }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center font-medium text-gray-800">{{ $entry->name }}</td>
                                    <td class="px-6 py-4 text-center font-bold text-orange-600 text-xl">{{ $entry->score }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
