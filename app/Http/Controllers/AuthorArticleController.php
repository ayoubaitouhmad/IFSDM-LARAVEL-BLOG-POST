<?php

namespace App\Http\Controllers;

use App\Enums\OrderBy;
use App\Models\User;
use Illuminate\Http\Request;


class AuthorArticleController extends Controller
{
    public function __invoke(Request $request , string $username)
    {

        $user = User::query()->where('username' ,$username)->firstOrFail();

        $query =  $user->articles()->newQuery();
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
            ->where('status', \App\Enums\ArticleStatus::PUBLISHED->value)
            ->paginate(10)
            ->withQueryString();


        return view('pages.author.user-articles.articles', [
            "activeFilters" => $activeFilters,
            "articles" => $articles,
            'user' => $user,
            "input"=>$request->all()
        ]);



    }
}
