<!-- resources/views/articles/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <article class="container mx-auto max-w-4xl px-4 py-8">


            <header class="mb-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $article->title }}</h1>
                <div class="flex items-center text-gray-500 text-sm">
                    <span>By <a href="{{ route('author.articles', $article->author->username) }}"  class="font-medium text-blue-600 hover:underline">{{ $article->author->username }}</a></span>
                    <span class="mx-2">•</span>
                                    <time datetime="{{ $article->published_at->toDateString() }}">{{ $article->published_at->format('F j, Y') }}</time>
                </div>
            </header>


            @if($article->image)
                <div class="mb-8">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                         class="w-full rounded-lg shadow-lg">
                </div>
            @endif

            <!-- Content -->
            <div class="prose prose-lg max-w-none mb-12">
                {!! $article->content !!}
            </div>

            <!-- Tags -->
            {{--        @if($article->tags->isNotEmpty())--}}
            {{--            <div class="mb-12">--}}
            {{--                <h2 class="font-semibold text-gray-700 mb-2">Tags:</h2>--}}
            {{--                <div class="flex flex-wrap gap-2">--}}
            {{--                    @foreach($article->tags as $tag)--}}
            {{--                        <a href="{{ route('articles.tag', $tag->slug) }}" class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-sm hover:bg-indigo-200">--}}
            {{--                            {{ $tag->name }}--}}
            {{--                        </a>--}}
            {{--                    @endforeach--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        @endif--}}

            <!-- Comments Section -->
            {{--        <section class="border-t pt-8">--}}
            {{--            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Comments</h2>--}}

            {{--            <!-- List comments -->--}}
            {{--            @forelse($article->comments as $comment)--}}
            {{--                <div class="mb-6">--}}
            {{--                    <div class="text-gray-700 font-medium">{{ $comment->author_name }}</div>--}}
            {{--                    <div class="text-gray-600 text-sm mb-2"><time datetime="{{ $comment->created_at->toDateString() }}">{{ $comment->created_at->diffForHumans() }}</time></div>--}}
            {{--                    <p class="text-gray-800">{{ $comment->content }}</p>--}}
            {{--                </div>--}}
            {{--            @empty--}}
            {{--                <p class="text-gray-600">No comments yet. Be the first to comment!</p>--}}
            {{--            @endforelse--}}

            {{--            <!-- Comment form -->--}}
            {{--            <form action="{{ route('comments.store', $article) }}" method="POST" class="mt-6">--}}
            {{--                @csrf--}}
            {{--                <div class="mb-4">--}}
            {{--                    <label for="author_name" class="block text-gray-700 font-medium mb-1">Your Name</label>--}}
            {{--                    <input type="text" name="author_name" id="author_name" required--}}
            {{--                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">--}}
            {{--                </div>--}}
            {{--                <div class="mb-4">--}}
            {{--                    <label for="content" class="block text-gray-700 font-medium mb-1">Comment</label>--}}
            {{--                    <textarea name="content" id="content" rows="4" required--}}
            {{--                              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>--}}
            {{--                </div>--}}
            {{--                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition">--}}
            {{--                    Post Comment--}}
            {{--                </button>--}}
            {{--            </form>--}}
            {{--        </section>--}}
        </article>
    </div>
@endsection
