<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    public function getProducts()
    {

        $data = Product::select('tags')
        ->selectRaw('count(tags) as qty')
        ->groupBy('tags')
        ->orderBy('qty', 'DESC')
        ->get();
        
        $data = json_decode($data, true);
        //$data = Arr::get($data, array('key', 'tags'));
        //dump($data[0]['tags'][0]['title']);
        //dd($data);
        return view('products', compact('data',));
    }
}
