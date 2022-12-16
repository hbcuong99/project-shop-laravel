<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Post\PostService;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Http\Requests\Product\CreateFormRequest;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.list', [
            'title' => 'Product list',
            'products' => $this->productService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Add new product',
            'products' => $this->productService->getMenu()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormRequest $request)
    {
        $this->productService->insert($request);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.edit', [
            'title' => 'Edit Product',
            'product' => $product,
            'menus' => $this->productService->getMenu()
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request, $product);

        if($result) {
            return redirect('/admin/products/list');
        }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->productService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Successfully deleted the item'
            ]);
        }

        return response()->json(['error' => true ]);
    }
}
