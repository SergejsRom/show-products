<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    public function getProducts()
    {

        $data = Product::select('tags')
        ->selectRaw('count(tags) as qty')
        ->groupBy('tags')
        ->orderBy('qty', 'ASC')
        ->get();
        
        $data = json_decode($data, true);
        // $data = Arr::get($data, 'tags.value.title');
        //dd($data);
        return view('products', compact('data',));
    }
}
