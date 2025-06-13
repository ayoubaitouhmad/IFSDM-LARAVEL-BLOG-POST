@extends("layouts.app")
@section("content")


    <div class="container mx-auto px-6 py-4">
        Hi {{ auth()->user()->name }}, welcome to your dashboard!
    </div>

@endsection
