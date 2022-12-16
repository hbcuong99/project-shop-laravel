<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function index(Request $request) {
        $result = $this->cartService->create($request);

        if($result === false){
            return redirect()->back();
        }

        return redirect('/carts');
    }

    public function show() {

        $products = $this->cartService->getProduct();
        return view('carts.list', [
            'title' => 'Cart',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function update(Request $request) {
        $this->cartService->update($request);

        return redirect('/carts');
    }

    public function remove($id) {
        $carts = Session::get('carts');
        unset($carts[$id]);

         Session::put('carts', $carts);
        return redirect('/carts');
    }

    public function addCart(Request $request){
        $this->cartService->addCart($request);

        return redirect()->back();
    }
}
