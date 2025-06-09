<!-- resources/views/articles/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <article class="container mx-auto max-w-4xl px-4 py-8">
            <!-- Breadcrumbs -->
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#"
                           class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="#"
                               class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span
                                class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Flowbite</span>
                        </div>
                    </li>
                </ol>
            </nav>


            <header class="mb-8">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $article->title }}</h1>
                <div class="flex items-center text-gray-500 text-sm">
                    <span>By <a href="#" class="font-medium hover:underline">{{ $article->author->username }}</a></span>
                    <span class="mx-2">•</span>
                    {{--                <time datetime="{{ $article->published_at->toDateString() }}">{{ $article->published_at->format('F j, Y') }}</time>--}}
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
