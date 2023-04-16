<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

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
            if (DB::table('products')->where('sku', $allproduct['sku'])->exists()) {
                DB::table('products')
                    ->where('sku', $allproduct['sku'])
                    ->update([
                        'sku' => $allproduct['sku'],
                        'description' => $allproduct['description'],
                        'size' => $allproduct['size'],
                        'photo' => $filename,
                        'tags' => $allproduct['tags'],
                        'updated_at' => $allproduct['updated_at']
                    ]);
            } else {
                Product::create([
                    'sku' => $allproduct['sku'],
                    'description' => $allproduct['description'],
                    'size' => $allproduct['size'],
                    'photo' => $filename,
                    'tags' => $allproduct['tags'],
                    'updated_at' => $allproduct['updated_at']
                ]);
            }
        }
        return view('products');
    }
}
