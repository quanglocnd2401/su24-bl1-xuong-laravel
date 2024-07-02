<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function list()
    {
        // dd(session('cart'));
        return view('cart-list');
    }
    public function add(){
        $product = Product::query()->findOrFail(\request('product_id'));
        $productVariant = ProductVariant::query()
        ->with(['size','color'])
        ->where([
            'product_id' => \request('product_id'),
            'product_size_id' => \request('product_size_id'),
            'product_color_id' => \request('product_color_id')
        ])
        ->firstOrFail();


         if(!isset(session('cart')[$productVariant->id])){
            $data =     $product->toArray()
            +   $productVariant->toArray()
            +   ['quantity_get'=>\request('quantity')];


            session()->put('cart.'.$productVariant->id, $data);
         }else{
            $data = session('cart')[$productVariant->id];
            $data['quantity_get'] = \request('quantity');

            session()->put('cart.'.$productVariant->id, $data);
         }

        // dd(session('cart'));

        return redirect()->route('cart.list');
    }
}
