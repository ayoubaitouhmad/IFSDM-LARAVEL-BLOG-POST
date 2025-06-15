<?php

namespace App\Http\Controllers\Authenticated\User\Articles;

use App\Enums\ArticleStatus;
use App\Enums\OrderBy;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

//        Article::factory()->count(10)->create();

        $user = Auth::user();
        $query = Article::query();

        $activeFilters = 0;

        $query->where('user_id', $user->id);

        if ($kw = $request->input('f-search')) {
            $query->where('title', 'like', "%{$kw}%");
            $activeFilters++;
        }

        if ($date = $request->input('f-startDate')) {
            $activeFilters++;
            $query->where('published_at' , '>', $date);
        }

        if ($date = $request->input('f-endDate')) {
            $activeFilters++;
            $query->where('published_at' , '<', $date);
        }

        if ($orderBy = $request->input('f-orderBy')) {
            $query->orderBy(OrderBy::from((int)$orderBy)->coulumn() , 'ASC');
        }

        $articles = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();


        return view('pages.authenticated.user-articles.articles', [
            "activeFilters" => $activeFilters,
            "articles" => $articles,
            "input"=>$request->all()
        ]);





    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statusOptions = ArticleStatus::toArray();
        return view('pages.authenticated.user-articles.create-article', [
            'statusOptions' => $statusOptions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:articles,slug'],
            'content' => ['required', 'string'],
            'status' => ['required', Rule::in(array_keys(ArticleStatus::toArray()))],
            'image'   => ['nullable', 'image', 'max:2048']
        ]);
        $validated['user_id'] = Auth::id();

        if((int)$validated['status'] == ArticleStatus::PUBLISHED->value) {
            $validated['status'] = ArticleStatus::PUBLISHED;
            $validated['published_at'] = now();
        }else{
            $validated['status'] = ArticleStatus::DRAFT;
        }
        $article = Article::query()->create($validated);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $file = $request->file('image');
            $filename = time().'_'.Str::slug($request->title).'.'.$file->getClientOriginalExtension();
            $filePath = $file->storeAs('articles', $filename, 'public');
            $article->update(['image' => $filePath]);
        }


        $this->success("success", "user profile updated successfully");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::query()->findOrFail($id);
        $statusOptions = ArticleStatus::toArray();
        return view('pages.authenticated.user-articles.show-article', [
            'statusOptions' => $statusOptions,
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $article = Article::query()->findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('articles', 'slug')->ignore($article->id)
            ],
            'content' => ['required', 'string'],
            'image'   => ['nullable', 'image', 'max:2048'],
            'status' => ['required', Rule::in(array_keys(ArticleStatus::toArray()))],
        ]);

        if((int)$validated['status'] == ArticleStatus::PUBLISHED->value) {
            $validated['status'] = ArticleStatus::PUBLISHED;
            $validated['published_at'] = now();
        } else {
            $validated['status'] = ArticleStatus::DRAFT;
        }

        $article->update($validated);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('articles', $filename, 'public');
            $article->update(['image' => $filePath]);
        }

        $this->success("success", "Article updated successfully");
        return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::destroy($id);
        $this->success('Deleting', "article deleted successfully");
        return back();
    }
}
