<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Slider\SliderService;

class ShopMenuController extends Controller
{

    protected $menuService;
    protected $sliderService;

    public function __construct(MenuService $menuService, SliderService $sliderService)
    {
        $this->menuService = $menuService;
        $this->sliderService = $sliderService;
    }

    public function index(Request $request, $id, $slug = '') {
        $menu = $this->menuService->getId($id);

        $menus = $this->menuService->show();

        $slider = $this->sliderService->show();

        $products = $this->menuService->getProduct($menu, $request);

        return view('menu', [
            'title' => $menu->name,
            'products' => $products,
            'menu' => $menu,
            'sliders' => $slider,
            'menus' => $menus
        ]);
    }
}
