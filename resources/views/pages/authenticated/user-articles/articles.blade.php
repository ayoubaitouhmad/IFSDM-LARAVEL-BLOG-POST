@extends("layouts.app")
@section("content")
    <x-articles
        :articles="$articles"
        :filter-route="route('user.articles.index')"
        :show-header="true"
        :active-filters="$activeFilters"
        :show-crud-buttons="true"

    />
@endsection
