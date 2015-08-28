<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;

class AdminProductsController extends Controller
{
    private $products;

    public function __construct(Product $product)
    {
        $this->middleware('guest');
        $this->products = $product;
    }

    public function index()
    {
        $products = $this->products->all();

        return $products;
    }

    public function insert()
    {
        return "INSERT";
    }

    public function update()
    {
        return "UPDATE";
    }

    public function delete()
    {
        return "DELETE";
    }

    public function select()
    {
        return "SELECT";
    }
}