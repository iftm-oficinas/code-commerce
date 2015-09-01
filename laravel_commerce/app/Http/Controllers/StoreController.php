<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $pFeatured = Product::featured()->get();

        return view('store.index', compact('categories', 'pFeatured'));
    }
}
