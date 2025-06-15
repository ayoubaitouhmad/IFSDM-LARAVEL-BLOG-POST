<article class="relative bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 hover:shadow-2xl transition-all duration-300 max-h-[350px] group">
    <!-- Top Gradient Header -->
    <div class="h-10 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 relative">
        <div class="absolute inset-0 bg-black/10"></div>

        <!-- CRUD Buttons in Top Section -->
        @if($showCrudButtons)
            @canany(['update', 'delete'], $article)
                <div class="absolute top-1 right-3 flex space-x-2">
                    @can('update', $article)
                        <a href="{{ route('user.articles.show', $article) }}"
                           class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-sm font-medium rounded-full shadow hover:bg-white/30 transition border border-white/20">
                            Edit
                        </a>
                    @endcan
                    @can('delete', $article)
                        <form action="{{ route('user.articles.destroy', $article) }}" method="POST"
                              onsubmit="return confirm('Are you sure?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1 bg-red-500/80 backdrop-blur-sm text-white text-sm font-medium rounded-full shadow hover:bg-red-600/80 transition border border-red-300/20">
                                Delete
                            </button>
                        </form>
                    @endcan
                </div>
            @endcanany
        @endif

        <!-- Draft Badge in Top Section -->
        @if($article->isDraft())
            <div class="absolute top-3 left-3">
                <span class="inline-flex items-center rounded-full bg-red-500/90 backdrop-blur-sm px-3 py-1 text-xs font-medium text-white border border-red-300/20">
                    brouillon
                </span>
            </div>
        @endif

        <!-- Decorative Elements -->
        <div class="absolute top-4 left-4">
            <div class="w-2 h-2 bg-white/40 rounded-full"></div>
        </div>
        <div class="absolute bottom-4 right-4">
            <div class="w-3 h-3 bg-white/30 rounded-full"></div>
        </div>
    </div>

    <!-- Image Section -->
    <a href="{{ route('articles.show', $article) }}" class="block">
        <div class="relative h-32 overflow-hidden">
            <img src="{{ \Illuminate\Support\Facades\Storage::url($article->image) }}"
                 alt="{{ $article->title }}"
                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
        </div>
    </a>

    <!-- Content Section -->
    <div class="p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">
            {{ $article->title }}
        </h2>

        <div class="flex items-center justify-between mb-3">
            <div class="text-gray-600 text-sm">
                by
                <a href="{{ route('author.articles', $article->author->username) }}"
                   class="font-medium text-indigo-600 hover:text-indigo-700 transition">
                    {{ $article->author->name }}
                </a>
                @isset($article->published_at)
                    <span class="text-gray-400">• {{ $article->published_at->format('M j, Y') }}</span>
                @endisset
            </div>
            <div class="flex items-center text-gray-500 text-sm bg-gray-50 px-2 py-1 rounded-full">
                <i class="fa-solid fa-eye mr-1 text-xs"></i>
                <span>{{ $article->views }}</span>
            </div>
        </div>

        <p class="text-gray-600 mb-4 text-sm line-clamp-2">
            {{ $article->slug }}
        </p>

        <a href="{{ route('articles.show', $article) }}"
           class="inline-flex items-center text-indigo-600 font-medium hover:text-indigo-700 transition group">
            Read more
            <i class="fa-solid fa-arrow-right ml-2 text-sm group-hover:translate-x-1 transition-transform"></i>
        </a>
    </div>
</article>
