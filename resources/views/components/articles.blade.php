<div class="min-h-screen bg-gray-100 py-8">


    <div class="container mx-auto bg-white p-6 rounded-lg shadow-sm">


        @if($showHeader)
            <div class="">
                <div class=" border-gray-200">
                    <div class="container mx-auto px-6 py-4">
                        <div class="flex items-center justify-between">
                            <h1 class="text-2xl font-semibold text-gray-900">Products</h1>
                            @auth
                                <a href="{{ route('user.articles.create') }}"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Add New article
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>

                <form action="{{ $filterRoute ?? null}}" method="get" id="f-form">

                    <div class="bg-gray-50 " id="activeFiltersBar" style="display: none;">
                        <div class="container mx-auto px-6 py-3">
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-gray-600">Active filters:</span>
                                <div class="flex flex-wrap gap-2">
                    <span
                        class="inline-flex items-center gap-1 px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">
                        Category: Jewelry
                        <button class="hover:text-purple-900">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </span>
                                    <span
                                        class="inline-flex items-center gap-1 px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">
                        Price: $50 - $100
                        <button class="hover:text-purple-900">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </span>
                                    <span
                                        class="inline-flex items-center gap-1 px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">
                        Rating: 4+ Stars
                        <button class="hover:text-purple-900">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="">
                        <div class="container mx-auto px-6 py-4">
                            <div class="flex items-center justify-between gap-4">
                                <!-- Search Bar -->
                                <div class="flex-1 max-w-md">
                                    <div class="relative">
                                        <svg
                                            class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>


                                        <input type="text"
                                               name="f-search"
                                               value="{{ request('f-search') }}"
                                               placeholder="Search articles..."
                                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center gap-3">
                                    <!-- Export Button -->

                                    <x-form.select placeholder="order by" wrapper-class="flex"
                                                   :value="request('f-orderBy')" name="f-orderBy"
                                                   :options="$orderByOptions"
                                                   value="{{ request('f-orderBy') }}"/>


                                    <button
                                        class="inline-flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                        </svg>
                                        <span class="text-gray-700">Export</span>
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>

                                    <!-- Filter Button -->
                                    <button id="btn-show-filters"
                                            class="inline-flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors"
                                            onclick="toggleFilters(e)">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                        </svg>
                                        <span class="text-gray-700">Filter</span>
                                        <span
                                            class="inline-flex items-center justify-center w-6 h-6 text-xs font-medium text-white bg-purple-600 rounded-full">
                                            {{$activeFilters}}
                                        </span>
                                    </button>


                                </div>
                            </div>

                            <!-- Expandable Filters Section -->
                            <div id="filtersPanel" class="@if(!$activeFilters) hidden @endif  mt-4 pt-4 ">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                    @if($showFilterByUser)
                                        <div>
                                            <x-form.select placeholder="author" name="f-author" label="Author"
                                                           :options="$users"
                                                           value="{{ request('f-author') }}"/>
                                        </div>
                                    @endif
                                    <!-- Category Filter Group -->


                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Published at
                                            (min/max)</label>
                                        <div class="flex gap-2">
                                            <input name="f-startDate" type="date" placeholder="Min"
                                                   value="{{ request('f-startDate') }}"
                                                   class="w-1/2 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                            <input name="f-endDate" value="{{ request('f-endDate') }}" type="date"
                                                   placeholder="Max"
                                                   class="w-1/2 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        </div>
                                    </div>

                                </div>
                                <div class="flex items-center justify-between mt-4 pt-4 ">
                                    <button type="reset" id="f-btn-reset-form"
                                            class="text-sm text-gray-600 hover:text-gray-800 font-medium">
                                        Clear All Filters
                                    </button>
                                    <div class="flex gap-2">
                                        <button
                                            class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                                class="px-4 py-2 text-sm bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                                            Apply Filters
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        @endif

        @if($articles->count())
            <main class="container mx-auto px-6 py-8 ">
                <div id="articles" class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                    @foreach($articles as $article)
                        <x-article-card :article="$article" :show-crud-buttons="$showCrudButtons"/>
                    @endforeach
                </div>
                <div class="flex justify-center mt-12">
                    <div class="container mx-auto px-6 pb-8">
                        {{ $articles->links('pagination::tailwind') }}
                    </div>
                </div>
            </main>
        @else
            <div class="flex flex-col items-center justify-center py-20">
                <!-- Icon -->
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-16 w-16 text-gray-300"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.75 8.75v9.5A2.75 2.75 0 0 0 5.5 21h13a2.75 2.75 0 0 0 2.75-2.75v-9.5A2.75 2.75 0 0 0 18.5 6H12l-2.75-2.75A2.75 2.75 0 0 0 6.5 6h-1A2.75 2.75 0 0 0 2.75 8.75z"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 12v6m3-3h-6"/>
                </svg>

                <!-- Title -->
                <h2 class="mt-6 text-2xl font-semibold text-gray-900">No articles</h2>

                <!-- Subtitle -->
                <p class="mt-2 text-sm text-gray-500"

                </p>

                <!-- Action Button -->
                @auth

                    <a href="{{ route('user.articles.create') }}"
                       class="mt-6 inline-flex items-center px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5 mr-2"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 4v16m8-8H4"/>
                        </svg>
                        New article
                    </a>
                @endauth
            </div>
        @endif


    </div>
</div>


<script>

    document.getElementById("f-btn-reset-form").addEventListener('click', function (e) {
        e.preventDefault();

        if (fSearch = document.querySelector('[name="f-search"]')) {
            fSearch.value = "";
        }
        if (fOrderBy = document.querySelector('[name="f-orderBy"]')) {
            fOrderBy.value = "";
        }
        if (fAuthor = document.querySelector('[name="f-author"]')) {
            fAuthor.value = "";
        }
        if (fStartDate = document.querySelector('[name="f-startDate"]')) {
            fStartDate.value = "";
        }
        if (fEndDate = document.querySelector('[name="f-endDate"]')) {
            fEndDate.value = "";
        }

        // Optional: Hide the filters panel after reset
        // document.getElementById('filtersPanel').classList.add('hidden');
    });
    document.getElementById("btn-show-filters").addEventListener('click', function (e) {
        e.preventDefault();
        const filtersPanel = document.getElementById('filtersPanel');
        filtersPanel.classList.toggle('hidden');
    });

</script>
