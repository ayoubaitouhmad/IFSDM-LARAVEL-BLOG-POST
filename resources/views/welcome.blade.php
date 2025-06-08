@extends("layouts.app")
@section("content")
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Welcome to My Modern Blog</h1>
            <p class="mb-6 text-lg md:text-xl">Discover the latest trends in web development, design, and more.</p>
            <a href="#articles" class="inline-block bg-white text-indigo-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Explore Articles →</a>
        </div>
    </section>


    <main id="articles" class="flex-1 container mx-auto px-6 py-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        <article class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition">
            <img src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?q=80&w=3869&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Learn Tailwind CSS">
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-2">How to Learn Tailwind CSS</h2>
                <div class="text-gray-500 text-sm mb-4">by Jane Smith • June 7, 2025</div>
                <p class="text-gray-700 mb-4">Tailwind CSS is a utility-first CSS framework. Learn how to get started quickly and build beautiful UIs faster.</p>
                <a href="#" class="text-indigo-600 font-medium hover:underline">Read more →</a>
            </div>
        </article>

    </main>

@endsection
