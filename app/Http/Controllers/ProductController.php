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

    public function updateProducts()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://kinfirm.com/app/uploads/laravel-task/stocks.json');
        $response = $request->getBody();

        $allstocks = json_decode($response, true);

        foreach ($allstocks as $allstock) {
            if (DB::table('products')->where('sku', $allstock['sku'])->exists()) {
                if (DB::table('stocks')
                    ->where('city', $allstock['city'])
                    ->where('product_sku', $allstock['sku'])
                    ->exists()
                ) {
                    DB::table('stocks')
                        ->where('city', $allstock['city'])
                        ->update([
                            'stock' => $allstock['stock'],
                        ]);
                } elseif (DB::table('products')->where('sku', $allstock['sku'])->exists()) {
                    Stock::create([
                        'product_sku' => $allstock['sku'],
                        'stock' => $allstock['stock'],
                        'city' => $allstock['city'],
                    ]);
                }
            }
        }
        return view('update');
    }
}
