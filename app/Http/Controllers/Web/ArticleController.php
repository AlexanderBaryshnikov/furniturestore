<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends WebController
{
    public function index($slug)
    {
        $article = Article::where('slug', $slug)
            ->firstOrFail();

        return view('pages.article.index', compact('article'));
    }
}
