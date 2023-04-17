<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CountController extends Controller
{
    public function getProducts()
    {

        $data = Product::select('tags')
        ->selectRaw('count(tags) as qty')
        ->groupBy('tags')
        ->orderBy('qty', 'DESC')
        ->get();
        $data = json_decode($data, true);
        return view('products', compact('data',));
    }
}
