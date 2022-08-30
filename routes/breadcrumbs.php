<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

// Home > Articles
Breadcrumbs::for('articles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Статьи', route('articles.index'));
});

// Home > Articles > [Articles]
Breadcrumbs::for('articles.page', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('articles.index');
    $trail->push($article->title, route('articles.page', $article));
});

// Home > Offers
Breadcrumbs::for('offers.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Товары', route('offers.index'));
});

// Home > Offers > [Offer]
Breadcrumbs::for('offers.page', function (BreadcrumbTrail $trail, $offer) {
    $trail->parent('offers.index');
    $trail->push($offer->product->name, route('offers.page', $offer));
});
