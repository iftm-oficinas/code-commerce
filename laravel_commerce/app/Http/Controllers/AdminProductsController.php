<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    private $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index()
    {
        $products = $this->productModel->all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Requests\ProductRequest $request)
    {
        $input = $request->all();
        $product = $this->productModel->fill($input);
        $product->save();
        return redirect('admin/products');
    }

    public function update(Requests\ProductRequest $request, $id){
        $this->productModel->find($id)->update($request->all());
        return redirect('admin/products');
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        return redirect('admin/products');
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);
        return view('products.edit', compact('product'));
    }

}