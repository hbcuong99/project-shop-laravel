<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductHomeService;

class ShopMainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(MenuService $menu, SliderService $slider, ProductHomeService $product){
        $this->menu = $menu;
        $this->slider = $slider;
        $this->product = $product;
    }

    public function index() {
        return view('home', [
            'title' => 'Shop CuongHB',
            'menus' => $this->menu->show(),
            'sliders' => $this->slider->show(),
            'products' => $this->product->get()
        ]);
    }

    public function loadProduct(Request $request) {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) != 0) {
            $html = view('products.list', ['products' => $result])->render();

            return response()->json(['html' => $html]);
        }

        return response()->json(['html' => '']);
    }
}
