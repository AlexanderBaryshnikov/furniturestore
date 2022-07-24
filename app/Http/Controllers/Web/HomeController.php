<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends WebController
{
    public function index()
    {
        $articles = Article::limit(3)
            ->orderBy('id', 'desc')
            ->get();

        return view('home', compact('articles'));
    }
}
