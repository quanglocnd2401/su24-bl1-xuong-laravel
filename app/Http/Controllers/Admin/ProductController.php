<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catelogue;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductController extends Controller
{   

    const PATH_VIEW = 'admin.products.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::query()->with('catelogue','tags')->latest('id')->get(); // with()
        foreach ($data as $pro) {
            $pro->catelogue->name;
        }
      
        return view(self::PATH_VIEW . __FUNCTION__ , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $catelogues = Catelogue::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
       
        return view(self::PATH_VIEW . __FUNCTION__ , compact('catelogues', 'colors', 'sizes') );
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
