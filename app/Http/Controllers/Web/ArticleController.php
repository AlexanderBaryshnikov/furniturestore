<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends WebController
{
    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->firstOrFail();
        $breadcrumbs = \Breadcrumbs::render('articles.page', $article) ?? '';

        return view('pages.article.index', compact('article', 'breadcrumbs'));
    }
}
