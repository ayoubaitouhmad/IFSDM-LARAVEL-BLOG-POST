@extends("layouts.app")
@section("content")




    <main id="articles" class="flex-1 container mx-auto px-6 py-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach($articles as  $article)
            <x-article-card :article="$article" :show-crud-buttons="true"></x-article-card>
        @endforeach

    </main>

    <div class="container mx-auto px-6 py-4">
        {{ $articles->links('pagination::tailwind') }}
    </div>

@endsection
