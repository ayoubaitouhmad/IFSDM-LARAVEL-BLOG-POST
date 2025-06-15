<article class="relative bg-white rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition">

    @if($showCrudButtons)
        @canany(['update', 'delete'], $article)
            <div class="absolute top-4 right-4 flex space-x-2">
                @can('update', $article)
                    <a href="{{ route('user.articles.show', $article) }}"
                       class="px-3 py-1 bg-indigo-600 text-white text-sm font-medium rounded-full shadow hover:bg-indigo-700 transition">
                        Edit
                    </a>
                @endcan
                @can('delete', $article)
                    <form action="{{ route('user.articles.destroy', $article) }}" method="POST"
                          onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-3 py-1 bg-red-600 text-white text-sm font-medium rounded-full shadow hover:bg-red-700 transition">
                            Delete
                        </button>
                    </form>
                @endcan
            </div>
        @endcanany
    @endif

    <a href="{{ route('articles.show', $article) }}">
        <img
            src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?q=80&w=3869&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Learn Tailwind CSS">
    </a>
    @if($article->isDraft())
        <span
            class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-red-600/10 ring-inset">
                        brouillon
                    </span>
    @endif

    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-2">
            {{ $article->title }}

        </h2>
        <div class="flex items-center justify-between mb-4">
            <div class="text-gray-500 text-sm">
                by
                <a href="{{ route('author.articles', $article->author->username) }}"
                   class="font-medium text-blue-600 hover:underline">
                    {{ $article->author->name }}
                </a>
                @isset($article->published_at)
                    • {{  $article->published_at->format('F j, Y') }}

                @endisset

            </div>
            <div class="flex items-center text-gray-500 text-sm">
                <i class="fa-solid fa-eye mr-1"></i>
                <span class="mx-1">{{ $article->views }}</span>

            </div>
        </div>

        <p class="text-gray-700 mb-4">
            {{ $article->slug }}
        </p>
        <a href="{{ route('articles.show', $article) }}"
           class="text-indigo-600 font-medium hover:underline">
            Read more →
        </a>

    </div>
</article>
