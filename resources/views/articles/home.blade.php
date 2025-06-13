@extends("layouts.app")
@section("content")

   <x-articles :articles="$articles" :show-header="true" :active-filters="$activeFilters" />
@endsection
