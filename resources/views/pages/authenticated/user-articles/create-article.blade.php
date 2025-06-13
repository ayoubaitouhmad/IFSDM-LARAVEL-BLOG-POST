<!-- resources/views/articles/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold mb-6">Create New Article</h1>

        <form action="{{ route('user.articles.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-2xl shadow-lg space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-gray-700 font-medium mb-1">Title<span class="text-red-500">*</span></label>
                <input
                    required
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    placeholder="Article title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                />
                @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="block text-gray-700 font-medium mb-1">Slug<span class="text-red-500">*</span></label>
                <input
                    required
                    type="text"
                    name="slug"
                    id="slug"
                    value="{{ old('slug') }}"
                    placeholder="article-slug"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                />
                @error('slug')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-gray-700 font-medium mb-1">Content<span class="text-red-500">*</span></label>
                <textarea
                    required
                    name="content"
                    id="content"
                    rows="8"
                    placeholder="Write your article here..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"  >{{ old('content') }}</textarea>
                @error('content')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Status -->
            <div>
                <x-form.select required name="status" label="status" :options="$statusOptions" />


            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block text-gray-700 font-medium mb-1">Featured Image<span class="text-red-500">*</span></label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    accept="image/*"
                    class="block w-full text-sm text-gray-500
               file:mr-4 file:py-2 file:px-4
               file:rounded-full file:border-0
               file:text-sm file:font-semibold
               file:bg-indigo-600 file:text-white
               hover:file:bg-indigo-700"
                />
                @error('image')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Submit -->
            <div class="text-right">
                <button
                    type="submit"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-full font-medium hover:bg-indigo-700 transition"
                >
                    Publish Article
                </button>
            </div>
        </form>
    </div>

    <script>
        // Auto-generate slug from title
        document.getElementById('title').addEventListener('input', function() {
            const slugInput = document.getElementById('slug');
            slugInput.value = this.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9-\s]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        });
    </script>
@endsection
