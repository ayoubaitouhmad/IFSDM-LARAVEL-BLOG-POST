<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::query()->with('author')->paginate(5);

        return view('articles.home', compact('articles'));
    }


    public function show(string $id, string $username = null, string $title = null)
    {
        $article = Article::query()->findOrFail($id);
        return view('articles.show', compact('article'));
    }
}
