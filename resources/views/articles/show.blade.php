<!-- resources/views/articles/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section with Gradient Top Design -->
        <div class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

            <!-- Decorative Elements -->
            <div class="absolute top-10 right-10 w-20 h-20 bg-white/10 rounded-full blur-xl"></div>
            <div class="absolute top-32 left-20 w-16 h-16 bg-white/5 rounded-full blur-lg"></div>
            <div class="absolute bottom-20 right-32 w-12 h-12 bg-white/10 rounded-full blur-md"></div>

            <div class="relative container mx-auto max-w-4xl px-4 py-16">
                <!-- Breadcrumb or Back Button -->
                <div class="mb-8">
                    <a href="{{ url()->previous() }}"
                       class="inline-flex items-center text-white/80 hover:text-white transition group">
                        <i class="fa-solid fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                        Back to Articles
                    </a>
                </div>

                <!-- Article Header -->
                <header class="text-center mb-12">
                    <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                        {{ $article->title }}
                    </h1>

                    <!-- Author and Date Info -->
                    <div class="flex items-center justify-center space-x-6 text-white/90 mb-8">
                        <div class="flex items-center space-x-3">
                            <div
                                class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                <i class="fa-solid fa-user text-white text-sm"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm text-white/70">Written by</p>
                                <a href="{{ route('author.articles', $article->author->username) }}"
                                   class="font-semibold text-white hover:text-white/80 transition">
                                    {{ $article->author->username }}
                                </a>
                            </div>
                        </div>

                        <div class="w-px h-12 bg-white/20"></div>

                        <div class="flex items-center space-x-3">
                            <div
                                class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                <i class="fa-solid fa-calendar text-white text-sm"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm text-white/70">Published</p>
                                <time datetime="{{ $article->published_at?->toDateString() }}"
                                      class="font-semibold text-white">
                                    {{ $article->published_at?->format('F j, Y') }}
                                </time>
                            </div>
                        </div>
                    </div>

                    <!-- Article Stats -->
                    <div class="flex items-center justify-center space-x-8 text-white/80">
                        <div class="flex items-center space-x-2">
                            <i class="fa-solid fa-eye"></i>
                            <span>{{ $article->views ?? 0 }} views</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fa-solid fa-clock"></i>
                            <span class="text-white"> {{ $article->published_at->format('M j, Y') }}</span>
                        </div>
                    </div>
                </header>
            </div>

            <!-- Wave Separator -->
            <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
                <svg class="relative block w-full h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                     preserveAspectRatio="none">
                    <path
                        d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                        fill="#f9fafb"></path>
                </svg>
            </div>
        </div>

        <!-- Main Content Area -->
        <article class="container mx-auto max-w-4xl px-4 -mt-8 relative z-10">
            <!-- Featured Image Card -->
            <div
                class="bg-white rounded-2xl shadow-2xl overflow-hidden mb-12 transform hover:shadow-3xl transition-all duration-300">

                <img src="{{ \Illuminate\Support\Facades\Storage::url($article->image) }}"
                     alt="{{ $article->title }}"
                     class="w-full h-96 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>

                <div class=" bottom-6 left-6 right-6">
                    <div class="bg-white/90 backdrop-blur-sm rounded-lg p-4">
                        <p class="text-gray-600 text-sm">
                            {!! $article->content !!}
                        </p>
                    </div>
                </div>
            </div>


            <!-- Call to Action Section -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl p-8 text-center text-white mb-12">
                <h3 class="text-2xl font-bold mb-4">Enjoyed this article?</h3>
                <p class="text-white/90 mb-6">
                    Discover more insightful content from {{ $article->author->username }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('author.articles', $article->author->username) }}"
                       class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        More from {{ $article->author->username }}
                    </a>
                    <a href="{{ route('articles.index') }}"
                       class="bg-white/10 backdrop-blur-sm text-white px-6 py-3 rounded-lg font-semibold hover:bg-white/20 transition border border-white/20">
                        Browse All Articles
                    </a>
                </div>
            </div>
        </article>
    </div>
@endsection
