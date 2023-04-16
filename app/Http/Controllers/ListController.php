<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = cache()->remember('sku', 60*60*24, function () {
            return Product::all();
        });
        return view('blade-version', compact('products'));
    }



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Cache::get('sku')
        ->where('sku', $product->sku)
        ->first();

        return view('blade-version-show', compact('product'));
    }
}
