<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductHomeService;

class ShopProductController extends Controller
{
    protected $productService;

    public function __construct(ProductHomeService $productService){
        $this->productService = $productService;
    }

    public function index ($id = '', $slug = '') {
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);
        return view('products.content', [
           'title' => $product->name,
           'product' => $product,
            'products' => $productsMore
        ]);

    }
}
