<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        return Inertia::render('Home/Home', [
            'categories' => Category::where('visible', 1)->pluck('category_name', 'id')
        ]);
    }


    public function fetch_latest_listings(Request $request)
    {

        return Category::get()->each(function ($products) {
            $products->load('product_list');
        });
    }
}
