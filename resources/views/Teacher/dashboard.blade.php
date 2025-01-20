<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Flex Container -->
                    <div class="flex items-center justify-between">
                        <!-- Kiri: Profil User -->
                        <div class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="orange" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                            <div>
                                <h1 class="text-3xl font-bold uppercase mb-3">{{ $user->name }}</h1>
                                <span
                                    class="px-3 py-1 text-sm bg-orange-200 text-orange-800 rounded-full font-semibold"
                                    >{{ $user->role->nama_role }}</span>
                            </div>
                        </div>

                        <!-- Kanan: Statistik dan Tombol -->
                        <div class="flex flex-col items-end gap-4">
                            <!-- Statistik -->
                            <div class="flex gap-6">
                                <div class="text-center">
                                    <h2 class="text-xl font-bold">{{ $quizCount }}</h2>
                                    <p class="text-gray-500">Quiz</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
 