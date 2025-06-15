@extends("layouts.app")
@section("content")
    <x-articles
        :articles="$articles"
        :filter-route="route('author.articles' ,  $user->username)"
        :show-header="true"
        :active-filters="$activeFilters"
        :show-crud-buttons="false"
    />
@endsection
