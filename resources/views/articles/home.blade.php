@extends("layouts.app")
@section("content")

    <x-articles
        :articles="$articles"
        :filter-route=" route('articles.index')"
        :show-header="true"
        :active-filters="$activeFilters"
        :show-filter-by-user="true"
    />
@endsection
