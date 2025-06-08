<header class="bg-white shadow sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-indigo-600">MyBlog</a>
        <nav class="hidden md:flex space-x-8 font-medium">
            <a href="#" class="hover:text-indigo-600 transition">Home</a>
            <a href="#articles" class="hover:text-indigo-600 transition">Articles</a>
            <a href="#" class="hover:text-indigo-600 transition">About</a>
        </nav>
        <div class="flex items-center space-x-4">
            <div class="hidden md:flex items-center space-x-2">
                <img src="https://via.placeholder.com/40" alt="User Avatar" class="w-10 h-10 rounded-full shadow-sm">
                <span class="font-medium">John Doe</span>
            </div>
            <button class="md:hidden focus:outline-none" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
    <div id="mobile-menu" class="md:hidden hidden bg-white px-6 pt-2 pb-4 border-t">
        <a href="#" class="block py-2 font-medium hover:text-indigo-600 transition">Home</a>
        <a href="#articles" class="block py-2 font-medium hover:text-indigo-600 transition">Articles</a>
        <a href="#" class="block py-2 font-medium hover:text-indigo-600 transition">About</a>
        <div class="flex items-center py-2">
            <img src="https://via.placeholder.com/40" alt="User Avatar" class="w-10 h-10 rounded-full shadow-sm mr-2">
            <span class="font-medium">John Doe</span>
        </div>
    </div>
</header>
