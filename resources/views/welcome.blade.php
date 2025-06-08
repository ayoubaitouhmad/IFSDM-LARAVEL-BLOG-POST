<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Blog Home</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800">
<!-- Header -->
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

<!-- Hero Section -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Welcome to My Modern Blog</h1>
        <p class="mb-6 text-lg md:text-xl">Discover the latest trends in web development, design, and more.</p>
        <a href="#articles" class="inline-block bg-white text-indigo-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Explore Articles →</a>
    </div>
</section>

<!-- Articles Grid -->
<main id="articles" class="flex-1 container mx-auto px-6 py-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
    <article class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition">
        <img src="https://via.placeholder.com/400x200" alt="Learn Tailwind CSS">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-2">How to Learn Tailwind CSS</h2>
            <div class="text-gray-500 text-sm mb-4">by Jane Smith • June 7, 2025</div>
            <p class="text-gray-700 mb-4">Tailwind CSS is a utility-first CSS framework. Learn how to get started quickly and build beautiful UIs faster.</p>
            <a href="#" class="text-indigo-600 font-medium hover:underline">Read more →</a>
        </div>
    </article>
    <article class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition">
        <img src="https://via.placeholder.com/400x200" alt="Mastering JavaScript">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-2">Mastering JavaScript in 2025</h2>
            <div class="text-gray-500 text-sm mb-4">by Mark Lee • June 6, 2025</div>
            <p class="text-gray-700 mb-4">Explore the newest features in JavaScript and how to use them effectively in your projects.</p>
            <a href="#" class="text-indigo-600 font-medium hover:underline">Read more →</a>
        </div>
    </article>
    <article class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition">
        <img src="https://via.placeholder.com/400x200" alt="Static Site Generators">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-2">Why Use Static Site Generators?</h2>
            <div class="text-gray-500 text-sm mb-4">by Alice Johnson • June 5, 2025</div>
            <p class="text-gray-700 mb-4">Discover the benefits of using static site generators for fast, secure, and scalable websites.</p>
            <a href="#" class="text-indigo-600 font-medium hover:underline">Read more →</a>
        </div>
    </article>
</main>

<!-- Footer -->
<footer class="bg-white border-t py-8">
    <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-600">&copy; 2025 MyBlog. All rights reserved.</p>
        <div class="flex space-x-6 mt-4 md:mt-0 font-medium">
            <a href="#" class="hover:text-indigo-600 transition">Twitter</a>
            <a href="#" class="hover:text-indigo-600 transition">GitHub</a>
            <a href="#" class="hover:text-indigo-600 transition">LinkedIn</a>
        </div>
    </div>
</footer>

<script>
    // Mobile menu toggle is handled inline above
</script>
</body>
</html>
