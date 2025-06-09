<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $articles = Article::query()->with('author')->paginate(5);

        return view('home' , ['articles' => $articles]);
    }
}
