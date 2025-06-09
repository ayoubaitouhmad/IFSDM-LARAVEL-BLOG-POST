<?php

namespace App\Http\Controllers\User\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserArticleController extends Controller
{
    public function index()
    {
      $user = Auth::user();
      $articles = $user->articles()->latest()->paginate(5);
      return view('pages.authenticated.user-articles.articles', compact('articles'));
    }


}
