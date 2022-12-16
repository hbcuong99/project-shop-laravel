<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ProductService
{
    public function getMenu() {
        return Product::where('menu_id', 0)->get();
    }

    public function get(){
        return Product::with('menu')
        ->orderbyDesc('id')->paginate(15);
    }

    protected function isValidPrice($request){
        if($request->input('price') != 0 && $request->input('price_sale') != 0
        && $request->input('price_sale') >= $request->input('price')) {
            Session::flash('error', 'Price sale must be smaller price');
            return false;
        }

        if($request->input('price-sale') != 0 && $request->input('price') == 0) {
            Session::flash('success', 'Please enter original price');
            return false;
        }

        return true;

    }

    public function insert($request): bool
    {

        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $request->except('_token');
            Product::create($request->all());
            Session::flash('success', 'Add product success');
        } catch (\Exception $err) {
            Session::flash('error', 'Add product error');
            Log::info($err->getMessage());
            return false;
        }

        return true;

    }

    public function delete($request){
        $product =  Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }

    public function update($request, $product) : bool
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Update success');
        } catch (\Exception $err)
        {
            Session::flash('error', 'Error please again');
            Log::info($err->getMessage());
            return false;

        }
        return true;

    }
}
