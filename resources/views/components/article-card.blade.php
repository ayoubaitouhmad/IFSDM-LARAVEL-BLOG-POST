<article class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition">
    <img
        src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?q=80&w=3869&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        alt="Learn Tailwind CSS">
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-2">
            {{ $article->title }}
        </h2>
        <div class="flex items-center justify-between">
            <div class="text-gray-500 text-sm ">
                by Jane Smith • June 7, 2025
            </div>
            <div class="text-center">
                <i class="fa-solid fa-eye"></i>
                <span>
                    15
                </span>
            </div>

        </div>


        <p class="text-gray-700 mb-4">
            {{ $article->content }}

        </p>
        <a href="#" class="text-indigo-600 font-medium hover:underline">Read more →</a>
    </div>
</article>
