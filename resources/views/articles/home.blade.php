@extends("layouts.app")
@section("content")

    @if($articles->count() > 0)
        <main id="articles" class="flex-1 container mx-auto px-6 py-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach($articles as  $article)
                <x-article-card :article="$article"></x-article-card>
            @endforeach
        </main>
        <div class="container mx-auto px-6 py-4">
            {{ $articles->links('pagination::tailwind') }}
        </div>
    @else
        <main class="flex-1 container mx-auto px-6 py-12">
            <div class="flex flex-col items-center justify-center min-h-[400px] text-center">
                <!-- Icon or illustration -->
                <div class="mb-6">
                    <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                </div>

                <!-- Empty state message -->
                <h2 class="text-2xl font-semibold text-gray-700 mb-2">No Articles Found</h2>
                <p class="text-gray-500 mb-8 max-w-md">
                    It looks like there aren't any articles yet. Check back later or try adjusting your filters.
                </p>

                <!-- Optional action buttons -->
                <div class="flex gap-4">
                    @auth
                        <a href=""
                           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create New Article
                        </a>
                    @endauth

                    <a href="{{ route('home') }}"
                       class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Back to Home
                    </a>
                </div>d
            </div>
        </main>
    @endif
@endsection
