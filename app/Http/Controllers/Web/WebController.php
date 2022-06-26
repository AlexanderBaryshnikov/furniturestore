<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WebController extends Controller
{
    protected $categories_list;

    public function __construct()
    {
        $this->categories_list = Category::categoriesList();
        View::share('categories_list', $this->categories_list);
    }
}
