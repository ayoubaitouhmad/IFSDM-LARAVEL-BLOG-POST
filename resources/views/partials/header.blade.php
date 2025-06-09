<header class="bg-white shadow sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-indigo-600">MyBlog</a>
        <nav class="hidden md:flex space-x-8 font-medium">
            <a href="#" class="hover:text-indigo-600 transition">Home</a>
            <a href="#" class="hover:text-indigo-600 transition">Articles</a>
            <a href="#" class="hover:text-indigo-600 transition">About</a>
        </nav>
        <div class="flex items-center space-x-4">
            <div class="hidden md:flex items-center space-x-2">
                @isset($currentUser)
                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <!-- Profile Button -->
                        <button @click="open = !open"
                                @click.away="open = false"
                                class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                            <img src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?q=80&w=3869&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                 alt="User Avatar"
                                 class="w-10 h-10 rounded-full shadow-sm">
                            <span class="font-medium">{{ $currentUser->name }}</span>
                            <svg class="w-4 h-4 text-gray-600 transition-transform duration-200"
                                 :class="{ 'rotate-180': open }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg py-1 z-50">

                            <!-- User Info -->
                            <div class="px-4 py-3 border-b border-gray-100">
                                <p class="text-sm font-medium text-gray-900">{{ $currentUser->name }}</p>
                                <p class="text-sm text-gray-500 truncate">{{ $currentUser->email }}</p>
                            </div>

                            <!-- Menu Items -->
                            <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                My Profile
                            </a>

                            <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Settings
                            </a>

                            @if($currentUser->is_admin)
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                    Dashboard
                                </a>
                            @endif

                            <div class="border-t border-gray-100 mt-1"></div>

                            <a href="#" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition text-left">
                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Sign Out
                            </a>
                        </div>
                    </div>
                @else
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium transition">Login</a>
                    <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Sign Up</a>
                @endisset
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden focus:outline-none"
                    onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white px-6 pt-2 pb-4 border-t">
        <a href="#" class="block py-2 font-medium hover:text-indigo-600 transition">Home</a>
        <a href="#" class="block py-2 font-medium hover:text-indigo-600 transition">Articles</a>
        <a href="#" class="block py-2 font-medium hover:text-indigo-600 transition">About</a>

        <div class="border-t mt-4 pt-4">
            @isset($currentUser)
                <div class="flex items-center space-x-3 mb-4">
                    <img src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?q=80&w=3869&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                         alt="User Avatar"
                         class="w-10 h-10 rounded-full shadow-sm">
                    <div>
                        <p class="font-medium">{{ $currentUser->name }}</p>
                        <p class="text-sm text-gray-500">{{ $currentUser->email }}</p>
                    </div>
                </div>

                <a href="#" class="block py-2 text-gray-700 hover:text-indigo-600 transition">My Profile</a>
                <a href="#" class="block py-2 text-gray-700 hover:text-indigo-600 transition">Settings</a>
                @if($currentUser->is_admin)
                    <a href="#" class="block py-2 text-gray-700 hover:text-indigo-600 transition">Dashboard</a>
                @endif

                <a href="#" class="block w-full text-left py-2 text-red-600 hover:text-red-700 transition">
                    Sign Out
                </a>
            @else
                <a href="#" class="block py-2 text-indigo-600 hover:text-indigo-700 transition">Login</a>
                <a href="#" class="block py-2 bg-indigo-600 text-white text-center rounded-lg hover:bg-indigo-700 transition mt-2">Sign Up</a>
            @endisset
        </div>
    </div>
</header>
