<?php

namespace App\Http\Controllers\Authenticated\User\Articles;

use App\Enums\ArticleStatus;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserArticleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $articles = $user->articles()?->latest()->paginate(5);
        return view('pages.authenticated.user-articles.articles', compact('articles'));
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
//            'image'   => ['nullable', 'image', 'max:2048']
        ]);
        $validated['user_id'] = Auth::id();

        if((int)$validated['status'] == ArticleStatus::PUBLISHED->value) {
            $validated['status'] = ArticleStatus::PUBLISHED->text();
            $validated['published_at'] = now();
        }else{
            $validated['status'] = ArticleStatus::DRAFT->text();
        }

        Article::query()->create($validated);
        $this->success("success", "user profile updated successfully");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
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
