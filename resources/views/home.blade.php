@extends("layouts.app")
@section("content")
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Welcome to My Modern Blog</h1>
            <p class="mb-6 text-lg md:text-xl">Discover the latest trends in web development, design, and more.</p>
            <a href="#articles"
               class="inline-block bg-white text-indigo-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Explore
                Articles →</a>
        </div>
    </section>

   <x-articles :articles="$articles"  :show-header="false" />

@endsection
