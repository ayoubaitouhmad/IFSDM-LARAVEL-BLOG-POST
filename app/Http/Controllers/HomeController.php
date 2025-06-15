<?php

namespace App\Http\Controllers;

use App\Enums\ArticleStatus;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $articles = Article::query()->where('status', ArticleStatus::PUBLISHED->value)->with('author')->paginate(5);

        return view('home' , ['articles' => $articles]);
    }
}
