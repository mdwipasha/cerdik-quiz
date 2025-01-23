<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                
                @if (Auth::user()->role_id == 1)
                <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('siswa.dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>
                <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('siswa.dashboard')" :active="request()->routeIs('siswa.dashboard')">
                            <i class="bi bi-house me-1 text-lg"></i> {{ __('Dashboard') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('siswa.course')" :active="request()->routeIs('siswa.course')">
                            <i class="bi bi-journal-text me-1 text-lg"></i> {{ __('My Courses') }}
                        </x-nav-link>                        
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('quiz.finished')" :active="request()->routeIs('quiz.finished')">
                            <i class="bi bi-journal-text me-1 text-lg"></i> {{ __('Results') }}
                        </x-nav-link>                        
                    </div>
                @endif
                @if (Auth::user()->role_id == 2)
                 <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('guru.dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>
                 <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('guru.dashboard')" :active="request()->routeIs('guru.dashboard')">
                            <i class="bi bi-house me-1 text-lg"></i> {{ __('Dashboard') }}
                        </x-nav-link>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('guru.courses')" :active="request()->routeIs('guru.courses') || request()->routeIs('edit.quiz') || request()->routeIs('detail.courses') || request()->routeIs('question.courses') || request()->routeIs('edit.question') || request()->routeIs('show.siswa') || request()->routeIs('siswa.courses') || request()->routeIs('result.courses')">
                            <i class="bi bi-journal-text me-1 text-lg"></i> {{ __('My Courses') }}
                        </x-nav-link>                        
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('create.courses')" :active="request()->routeIs('create.courses')">
                            <i class="bi bi-journal-plus me-1 text-lg"></i> {{ __('New Courses') }}
                        </x-nav-link>
                    </div>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-base leading-4 font-bold rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div class="text-black">{{ Auth::user()->name }}</div>
                            <div class="ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="orange" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                    
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (Auth::user()->role_id == 1)
            <x-responsive-nav-link :href="route('siswa.dashboard')" :active="request()->routeIs('siswa.dashboard')">
                <i class="bi bi-house me-1 text-lg"></i> {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('siswa.course')" :active="request()->routeIs('siswa.course')">
                <i class="bi bi-journal-text me-1 text-lg"></i> {{ __('My Courses') }}
            </x-responsive-nav-link>
            @endif
            @if (Auth::user()->role_id == 2)
            <x-responsive-nav-link :href="route('guru.dashboard')" :active="request()->routeIs('guru.dashboard')">
                <i class="bi bi-house me-1 text-lg"></i> {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('guru.courses')" :active="request()->routeIs('guru.courses') || request()->routeIs('edit.quiz') || request()->routeIs('detail.courses') || request()->routeIs('question.courses') || request()->routeIs('edit.question') || request()->routeIs('show.siswa') || request()->routeIs('siswa.courses') || request()->routeIs('result.courses')">
                <i class="bi bi-journal-text me-1 text-lg"></i> {{ __('My Courses') }}
            </x-responsive-nav-link>      
            <x-responsive-nav-link :href="route('create.courses')" :active="request()->routeIs('create.courses')">
                <i class="bi bi-journal-plus me-1 text-lg"></i> {{ __('New Courses') }}
            </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
