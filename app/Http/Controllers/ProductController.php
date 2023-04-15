<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    public function getProducts()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://kinfirm.com/app/uploads/laravel-task/products.json');
        $response = $request->getBody();

        $allproducts = json_decode($response, true);

        foreach ($allproducts as $allproduct) {
            $filename = basename(strstr(($allproduct['photo']), 'png', true) . 'png');
            $filepath = public_path('storage/' . $filename);
            if (!file_exists($filepath)) {
                Image::make($allproduct['photo'])->save(public_path('storage/' . $filename));
            }

            Product::updateOrCreate([
                'sku' => $allproduct['sku'],
                'description' => $allproduct['description'],
                'size' => $allproduct['size'],
                'photo' => $filename,
                'tags' => json_encode($allproduct['tags']),
                'updated_at' => $allproduct['updated_at']
            ]);
        }
        return view('products');
    }
}
