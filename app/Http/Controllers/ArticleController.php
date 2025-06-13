<?php

namespace App\Http\Controllers;

use App\Enums\ArticleStatus;
use App\Enums\OrderBy;
use App\Models\Article;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(Request $request)
    {

        $query = Article::query();

        $activeFilters = 0;

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

        if ($userId = $request->input('f-author')) {
            $activeFilters++;
            $query->where('user_id' ,  $userId);
        }

        if ($orderBy = $request->input('f-orderBy')) {
            $query->orderBy(OrderBy::from((int)$orderBy)->coulumn() , 'ASC');
        }




        $articles = $query
            ->where('status', ArticleStatus::PUBLISHED->value)
            ->latest()
            ->paginate(10)
            ->withQueryString();
//
//        dd(
//            $articles->all()
//        );


        return view('articles.home', [
            "activeFilters" => $activeFilters,
            "articles" => $articles,
            "input"=>$request->all()
        ]);
    }



    public function show(string $id, string $username = null, string $title = null)
    {
        $article = Article::query()->findOrFail($id);
        return view('articles.show', compact('article'));
    }
}
