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

// Home > Catalog
Breadcrumbs::for('catalog.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Каталог', route('catalog.index'));
});

// Home > Catalog > Category
Breadcrumbs::for('catalog.category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('catalog.index');
    $trail->push($category->name ?? 'Каталог', route('catalog.category', ['category' => $category]));
});

// Home > Catalog > Category > [Product]
Breadcrumbs::for('catalog.product', function (BreadcrumbTrail $trail, $product) {
    if ($product->category) {
        $trail->parent('catalog.category', $product->category);
    } else {
        $trail->parent('Товар');
    }
    $trail->push($product->name, route('catalog.product', ['category' => $product->category, 'product' => $product]));
});

// Home > Catalog > Category > Product > [Offer]
Breadcrumbs::for('catalog.offer', function (BreadcrumbTrail $trail,  $category, $product, $offer) {
    if ($offer->product) {
        $trail->parent('catalog.product', $offer->product);
    } else {
        $trail->parent('Товар');
    }
    $trail->push($offer->getNameWithSku(), route('catalog.offer', ['category' => $category, 'product' => $product, 'offer' => $offer]));
});
